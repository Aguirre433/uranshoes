<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Comprobantes;

class Proveedor extends Model
{
    /** @use HasFactory<\Database\Factories\ProveedorFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_proveedor',
        'email_proveedor',
        'telefono_proveedor',
        'direccion_proveedor',
        'cuit_proveedor',
    ];

    public function comprobantes()
    {
        return $this->hasMany(Comprobantes::class, 'proveedor_id');
    }
    
}
