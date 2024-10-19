<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Detalle_Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('facturas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //vD stants for validatedData
        /*
            'user_id',
            'cliente_id',
            'detalle__factura_id',
            'total',
          */
        $validatedData = $request->validate([
            'user_id' => auth()->id(),
            'cliente_id' => 'required|integer|exits:clientes,id',
            'detalle__fatura_id' => 'required|integer|exits:detalle__facturas,id',
            'total' => 'required|numeric',
        ]);

        Factura::create($validatedData);
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
