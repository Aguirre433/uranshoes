<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compra::with('producto')->orderBy('id', 'desc')->get();
        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('compras.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor'    => 'required|string|max:255',
            'producto_id'  => 'required|exists:productos,id',
            'cantidad'     => 'required|integer|min:1',
            'precio_costo' => 'required|numeric|min:0',
            'fecha_pedido' => 'required|date',
        ]);

        $producto = Producto::findOrFail($request->producto_id);
        $total = $request->precio_costo * $request->cantidad;

        $usuario = auth()->user();
        $usuarioId = $usuario ? ($usuario->id ?? $usuario->id_usuario ?? null) : null;

        // 1. Crear Orden de Compra
        $compra = Compra::create([
            'numero_orden'  => 'ORD-' . strtoupper(Str::random(6)),
            'proveedor'     => $request->proveedor,
            'producto_id'   => $producto->id,
            'cantidad'      => $request->cantidad,
            'precio_costo'  => $request->precio_costo,
            'total'         => $total,
            'fecha_pedido'  => $request->fecha_pedido,
            'estado_pedido' => 'Recibido',
            'usuario_id'    => $usuarioId,
        ]);

        // 2. Incrementar el stock en la tabla productos
        $producto->increment('stock', $request->cantidad);

        // 3. Registrar en Actividad reciente
        Actividad::create([
            'titulo'      => 'Nueva Compra a Proveedor',
            'descripcion' => "Ingreso {$compra->numero_orden} - {$producto->nombre} (+{$request->cantidad} un.)",
            'tipo'        => 'compra',
            'user_id'     => $usuarioId,
        ]);

        return redirect()->route('compras.index')->with('success', 'Orden de compra registrada y stock sumado al inventario.');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);

        // Descontar del stock si se anula la compra
        if ($compra->producto && $compra->producto->stock >= $compra->cantidad) {
            $compra->producto->decrement('stock', $compra->cantidad);
        }

        $compra::destroy($id);

        return redirect()->route('compras.index')->with('success', 'Orden de compra eliminada correctamente.');
    }
}