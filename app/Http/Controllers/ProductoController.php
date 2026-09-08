<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {

  {
    $productos = Producto::with([
        'categoria',
        'marca',
        'proveedor'
    ])->get();

    return view('productos.index', compact('productos'));
}
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('productos.create', compact(
            'proveedores',
            'categorias',
            'marcas'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'talle' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'proveedor_id' => 'required|exists:proveedores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        Producto::create($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view('productos.edit', compact(
            'producto',
            'proveedores',
            'categorias',
            'marcas'
        ));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'talle' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'proveedor_id' => 'required|exists:proveedores,id',
            'categoria_id' => 'required|exists:categorias,id',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $producto->update($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto eliminado.');
    }
}