<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Spatie\Permission\Models\Role;
use App\Models\Actividad;

class UserController extends Controller
{

// Mostrar el formulario con los roles
    public function editRoles(Usuario $user)
    {
        // Traemos todos los roles de la base de datos
        $roles = Role::all(); 
        
        return view('users.roles', compact('user', 'roles'));
    }

    // Guardar los roles seleccionados
    public function updateRoles(Request $request, User $user)
    {
        // Spatie tiene un método mágico llamado "syncRoles".
        // Lo que hace es: mira los roles que llegaron del formulario, 
        // se los asigna al usuario, y le quita los que no estén marcados.
        $user->syncRoles($request->roles);

        // Volvemos a la página anterior con un mensaje de éxito
        return redirect()->back()->with('success', 'Roles actualizados correctamente.');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // 1. Obtener todos los usuarios de la base de datos
        $usuarios = Usuario::all(); 

        // 2. Pasar la variable $usuarios a la vista
        return view('users.index', compact('usuarios'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = User::create($data);

    Actividad::create([
        'titulo'      => 'Nuevo usuario registrado',
        'descripcion' => $usuario->name,
        'tipo'        => 'usuario',
        'user_id'     => auth()->id(),
    ]);

    return redirect()->route('users.index')->with('success', 'Usuario registrado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
