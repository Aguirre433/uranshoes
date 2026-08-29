<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    /** @use HasFactory<\Database\Factories\VentaFactory> */
    use HasFactory;
    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'comprobante_id',
        'total_venta',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class, 'Usuario_id');
    
    }

    public function comprobante(){

        return$this->belongsTo(Comprobante::class, 'comprobante_id')

    }
}
