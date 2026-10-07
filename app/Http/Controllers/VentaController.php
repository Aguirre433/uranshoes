<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->orderBy('id', 'desc')->get();
        $productos = Producto::all();
        return view('ventas.index', compact('ventas', 'productos'));
    }

    public function create()
    {
        $productos = Producto::where('stock', '>', 0)->get();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_nombre' => 'required|string|max:255',
            'producto_id'    => 'required|exists:productos,id',
            'cantidad'       => 'required|integer|min:1',
            'metodo_pago'    => 'required|string',
        ]);

        $producto = Producto::findOrFail($request->producto_id);

        // Validar si hay stock suficiente
        if ($producto->stock < $request->cantidad) {
            return back()->withInput()->with('error', 'No hay stock suficiente para realizar esta venta. Stock disponible: ' . $producto->stock);
        }

        $total = $producto->precio * $request->cantidad;

        // Obtener el ID del usuario autenticado de forma explícita
        $usuario = auth()->user();
        $usuarioId = $usuario ? ($usuario->id ?? $usuario->id_usuario ?? null) : null;

        // 1. Registrar la venta
        $venta = Venta::create([
            'codigo_factura' => 'VEN-' . strtoupper(Str::random(6)),
            'cliente_nombre' => $request->cliente_nombre,
            'producto_id'    => $producto->id,
            'cantidad'       => $request->cantidad,
            'precio_unitario'=> $producto->precio,
            'total'          => $total,
            'metodo_pago'    => $request->metodo_pago,
            'estado'         => 'Completada',
            'usuario_id'     => $usuarioId,
        ]);

        // 2. Descontar el stock en la tabla productos
        $producto->decrement('stock', $request->cantidad);

        // 3. Registrar en Actividad reciente
        Actividad::create([
            'titulo'      => 'Nueva Venta Registrada',
            'descripcion' => "Venta {$venta->codigo_factura} - {$producto->nombre} (x{$request->cantidad})",
            'tipo'        => 'venta',
            'user_id'     => $usuarioId,
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada con éxito y stock actualizado.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        
        // Devolver el stock si se anula la venta
        if ($venta->producto) {
            $venta->producto->increment('stock', $venta->cantidad);
        }

        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta anulada correctamente y stock devuelto.');
    }
}