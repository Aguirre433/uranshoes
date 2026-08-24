<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Comprobantes;

class Sucursal extends Model
{
    /** @use HasFactory<\Database\Factories\SucursalFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_sucursal',
        'direccion_sucursal',
    ];

    public function comprobantes()
    {
        return $this->hasMany(Comprobantes::class, 'sucursal_id');
    }
}
