<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Gama;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vehiculos = Vehiculo::all();
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $gamas = Gama::all(); //Paso los datos de la tabla gamas para poder imprimirlos en select de la vista create
        return view('vehiculos.create', compact('gamas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'color' => 'required|string|max:30',
            'ano_creacion' => 'required|integer|digits:4', // Validación para aceptar solo 4 dígitos
            'gama_id' => 'required|integer|exists:gamas,id', // Verifica que gama_id exista en la tabla gammas
        ]);

        Vehiculo::create($validatedData);
        return to_route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
