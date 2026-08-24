<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Cliente;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
    ];

    public function detalleComprobantes()
    {
        return $this->hasMany(Detalle_comprobantes::class, 'producto_id');
    }
}
