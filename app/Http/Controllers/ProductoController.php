<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\Actividad;

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
        // 2. Tomamos todos los datos del formulario
        $data = $request->all();

        // 3. Si se subió una imagen, la guardamos en storage/app/public/productos
        if ($request->hasFile('imagen')) {
        $data['imagen'] = $request->file('imagen')->store('productos', 'public');
    }

     // 4. Creamos el producto con la imagen y stock incluidos
        $producto = Producto::create($data);

        // 👈 2. Guardamos la actividad al CREAR
        Actividad::create([
            'titulo'      => 'Producto agregado',
            'descripcion' => $producto->nombre,
            'tipo'        => 'producto',
            'user_id' => auth()->user()->getKey(),
        ]);

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
        $data = $request->all();

        // Si subió una nueva imagen, borrar la antigua y guardar la nueva
        if ($request->hasFile('imagen')) {
        if ($producto->imagen && \Storage::disk('public')->exists($producto->imagen)) {
            \Storage::disk('public')->delete($producto->imagen);
        }
        $data['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($data);

        Actividad::create([
            'titulo'      => 'Producto actualizado',
            'descripcion' => $producto->nombre,
            'tipo'        => 'producto',
            'user_id' => auth()->user()->getKey(),
        ]);

        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
    $nombreProducto = $producto->nombre;

    $producto->delete();

    Actividad::create([
        'titulo'      => 'Producto eliminado',
        'descripcion' => $nombreProducto,
        'tipo'        => 'producto',
        'user_id'     => auth()->user()->getKey(),
    ]);

    return redirect()
        ->route('productos.index')
        ->with('success', 'Producto eliminado.');
    }
}