<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function calcularPrecio(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'dias' => 'required|integer|min=1',
        ]);

        // Obtener el vehículo y la gama asociada
        $vehiculo = Vehiculo::with('gama')->findOrFail($request->vehiculo_id);
        $gama = $vehiculo->gama;

        // Determinar el precio según la cantidad de días
        $dias = $request->dias;
        if ($dias > 30) {
            $precio = $gama->precio_mayor_30;
        } elseif ($dias > 14) {
            $precio = $gama->precio_mayor_14;
        } else {
            $precio = $gama->precio_normal;
        }

        // Devolver el precio como respuesta JSON
        return response()->json(['precio' => $precio]);
    }
}
