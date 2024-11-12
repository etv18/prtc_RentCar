<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Detalle_Factura;
use App\Models\Vehiculo;
use App\Models\Cliente;
use App\Models\Gama;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //public function calcular(Request $request) {}
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
        $gamas = Gama::all();
        $vehiculos = Vehiculo::all();
        $clientes = Cliente::all();
        $user = auth()->user();
        $ultimoId = Factura::latest('id')->first()->id ?? 0; // Obtener el último ID o 0 si no hay registros
        $nuevoId = $ultimoId + 1; // Sumar 1 al último ID

        return view(
            'facturas.create',
            compact(
                'clientes',
                'vehiculos',
                'user',
                'nuevoId',
                'gamas',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'total' => 'required|numeric|min:0',

            //Datos detalle__facturas
            'vehiculo_id.*' => 'required|exists:vehiculos,id',
            'fecha_inicio.*' => 'required|date',
            'fecha_fin.*' => 'required|date|after:fecha_inicio.*',
            'precio_dia.*' => 'required|numeric|min:0',
            'cantidad_dias.*' => 'required|integer|min:1',
            'total_vehiculo.*' => 'required|numeric|min:0'
        ]);

        //dd($validatedData);

        //Creando la factura
        $factura = Factura::create([
            'user_id' => auth()->id(),
            'cliente_id' => $validatedData['cliente_id'],
            'total' => $validatedData['total'],
        ]);

        //creando los detalles de la factura
        foreach ($validatedData['vehiculo_id'] as $key => $vehiculoId) {
            Detalle_Factura::create([
                'factura_id' => $factura->id,
                'vehiculo_id' => $vehiculoId,
                'precio_dia' => $validatedData['precio_dia'][$key],
                'fecha_inicio' => $validatedData['fecha_inicio'][$key],
                'fecha_fin' => $validatedData['fecha_fin'][$key],
                'cantidad_dias' => $validatedData['cantidad_dias'][$key],
                'total_vehiculo' => $validatedData['total_vehiculo'][$key],
            ]);
        }
        return "registro creado";
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
