<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comprobantes;

class Compra extends Model
{
    /** @use HasFactory<\Database\Factories\ComprasFactory> */
    use HasFactory;
    protected $fillable = [
        'proveedor_id',
        'usuario_id',
        'comprobante_id',
        'total_compra',
    ];

    public function Proveedor()
    {
        return $this->belongTo(Proveedor::class, 'proveedor_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Ususario::class, 'usuario_id')
    }

    public function comprobante()
    {
        return $this->belongsTo(Comprobante::class, 'comprobante_id')
    }
}
