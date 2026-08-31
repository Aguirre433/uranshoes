<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{ 
    public function create()
{
    return view('auth.register');
}
    public function store(Request $request): RedirectResponse
    {
        // 1. Validar usando los nombres de los inputs de tu formulario BLADE
        // (Si tu formulario usa name="email", valida 'email'. Si usa name="email_usuario", cámbialo aquí)
        $request->validate([
            'nombre_usuario' => ['required', 'string', 'max:100'],
            'email_usuario'  => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:'.Usuario::class.',email_usuario'],
            'password'       => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Crear el registro en la base de datos mapeando a tus columnas
        $user = Usuario::create([
            'nombre_usuario'     => $request->nombre_usuario,
            'email_usuario'      => $request->email_usuario,
            'contrasena_usuario' => Hash::make($request->password),
            'rol_usuario'        => 'cliente',
            'sucursal_id'        => 1, // Asegúrate de tener una sucursal con ID=1 creada
        ]);

        event(new Registered($user));

        // 3. Iniciar sesión automáticamente tras el registro
        Auth::login($user);

        // 4. Redirigir al Dashboard
        return redirect(route('dashboard', absolute: false));
    }
}