<?php

namespace App\Http\Controllers;

use App\Models\Usuario; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = Usuario::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario'     => 'required|string|max:255',
            'email_usuario'      => 'required|email|unique:usuarios,email_usuario',
            'contrasena_usuario' => 'required|string|min:6',
            'rol_usuario'        => 'required|string',
        ]);

        Usuario::create([
            'nombre_usuario'     => $request->nombre_usuario,
            'email_usuario'      => $request->email_usuario,
            'contrasena_usuario' => Hash::make($request->contrasena_usuario),
            'rol_usuario'        => $request->rol_usuario,
            'sucursal_id'        => $request->sucursal_id ?? 1,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = Usuario::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Usuario::findOrFail($id);

        $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'email_usuario'  => 'required|email|unique:usuarios,email_usuario,' . $id,
            'rol_usuario'    => 'required|string',
        ]);

        $data = [
            'nombre_usuario' => $request->nombre_usuario,
            'email_usuario'  => $request->email_usuario,
            'rol_usuario'    => $request->rol_usuario,
        ];

        if ($request->filled('contrasena_usuario')) {
            $data['contrasena_usuario'] = Hash::make($request->contrasena_usuario);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = Usuario::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}