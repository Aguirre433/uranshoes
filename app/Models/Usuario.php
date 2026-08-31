<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable implements AuthenticatableContract
{
    use Notifiable, HasRoles;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_usuario',
        'email_usuario',
        'contrasena_usuario',
        'rol_usuario',
        'sucursal_id',
    ];

    protected $hidden = [
        'contrasena_usuario',
        'remember_token',
    ];

    /**
     * Mapea la columna de contraseña para Laravel.
     */
    public function getAuthPasswordName()
    {
        return 'contrasena_usuario';
    }

    /**
     * Mapea la columna identificadora (email).
     */
    public function getAuthIdentifierName()
    {
        return 'email_usuario';
    }

    /**
     * Obtiene el identificador del usuario.
     */
    public function getAuthIdentifier()
    {
        return $this->getAttribute($this->getAuthIdentifierName());
    }

    /**
     * Métodos para la gestión de "Recordar sesión" (Remember Token).
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}