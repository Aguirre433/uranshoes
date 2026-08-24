<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comprobantes;

class Usuario extends Model
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre_usuario',
        'email_usuario',
        'contrasena_usuario',
        'rol_usuario',
        'sucursal_id',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    public function ventas(){
        return $this->hasMany(Venta::class, 'usuario_id')
    }
    
    public function compras(){
        return $this->hasMany(Compra::class, 'usuario_id')
    }

}
