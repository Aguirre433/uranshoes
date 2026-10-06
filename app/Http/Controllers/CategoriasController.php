<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Actividad;

class CategoriasController extends Controller
{
    // Carga la lista y el formulario vacíos
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    // Guarda una nueva categoría y vuelve a la lista
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($request->all());

         Actividad::create([
        'titulo'      => 'Categoría agregada',
        'descripcion' => $categoria->nombre,
        'tipo'        => 'categoria',
        'user_id'     => auth()->user()->getKey()
         ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría guardada con éxito.');
    }

    // En lugar de ir a otra vista, recarga la lista pasando la categoría a editar
    public function edit($id)
    {
        $categorias = Categoria::all();
        $categoriaEditar = Categoria::findOrFail($id);

        return view('categoria.index', compact('categorias', 'categoriaEditar'));
    }

    // Actualiza los datos y vuelve a la lista limpia
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        $categoria->update($request->all());

        Actividad::create([
        'titulo'      => 'Categoría actualizada',
        'descripcion' => $categoria->nombre,
        'tipo'        => 'categoria',
        'user_id'     => auth()->id(),
        ]);
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    // Elimina la categoría
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada.');
    }
}