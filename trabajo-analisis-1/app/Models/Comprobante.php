<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\Proveedor;
use App\Models\Sucursal;

class Comprobante extends Model
{
    /** @use HasFactory<\Database\Factories\ComprobantesFactory> */
    use HasFactory;

    protected $fillable = [
        'tipo',
        'serie',
        'numero',
        'fecha_emision',
        'fecha_vencimiento',
        'cliente_id',
        'proveedor_id',
        'sucursal_id',
        'subtotal',
        'iva',
        'impuestos',
        'monto_total',
        'estado',
        'detalle',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}
