<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Cliente;
class Detalle_comprobante extends Model
{
    /** @use HasFactory<\Database\Factories\DetalleComprobantesFactory> */
    use HasFactory;
    protected $fillable = [
        'comprobante_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    public function comprobante()
    {
        return $this->belongsTo(Comprobantes::class, 'comprobante_id');
        
    }
}
