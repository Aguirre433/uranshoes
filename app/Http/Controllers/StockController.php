<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Actividad;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::latest()->get();
        return view('stock.index', compact('productos'));
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
    public function store(StoreStockRequest $request)
    
{
    // ... lógica para actualizar el stock ...
    $producto = Producto::findOrFail($productoId);
    $producto->increment('stock', $request->cantidad);

    Actividad::create([
        'titulo'      => 'Stock actualizado',
        'descripcion' => $producto->nombre . ' (' . $request->cantidad . ' un.)',
        'tipo'        => 'stock',
        'user_id'     => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'Stock actualizado.');
}
    

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockRequest $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
