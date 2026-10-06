<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Requests\StoreComprasRequest;
use App\Http\Requests\UpdateComprasRequest;
use App\Models\Actividad;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::latest()->get();
        return view('compras.index', compact('compras'));
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
    public function store(StoreComprasRequest $request)
    {
        // ... tu lógica para registrar la compra ...
    $compra = Compra::create($data);

    Actividad::create([
        'titulo'      => 'Compra registrada',
        'descripcion' => 'Orden de compra #' . str_pad($compra->id, 5, '0', STR_PAD_LEFT),
        'tipo'        => 'compra',
        'user_id'     => auth()->id(),
    ]);

    return redirect()->route('compras.index')->with('success', 'Compra registrada.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Compras $compras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compras $compras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComprasRequest $request, Compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compras $compras)
    {
        //
    }
}
