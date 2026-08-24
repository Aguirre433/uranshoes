<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Marca extends Model
{
    /** @use HasFactory<\Database\Factories\MarcasFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_marca',
        'descripcion_marca',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'marcas_id');
    }
}
