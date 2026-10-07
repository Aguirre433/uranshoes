<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'numero_orden',
        'proveedor',
        'producto_id',
        'cantidad',
        'precio_costo',
        'total',
        'fecha_pedido',
        'estado_pedido',
        'usuario_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
    
}