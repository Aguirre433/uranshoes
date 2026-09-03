<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUsuariosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
$request->validate([
    'nombre_usuario' => ['required', 'string', 'max:100'],
    'email_usuario' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:'.Usuario::class],
    'contrasena_usuario' => ['required', 'confirmed', Rules\Password::defaults()],
]);

$user = Usuario::create([
    'nombre_usuario' => $request->nombre_usuario,
    'email_usuario' => $request->email_usuario,
    'contrasena_usuario' => Hash::make($request->contrasena_usuario),
    'rol_usuario' => 'cliente', // O el rol por defecto que manejes
    'sucursal_id' => 1, // ID de sucursal por defecto
]);
}
