<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('clientes.index', [
            'clientes' => Cliente::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar los datos ingresados
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:11|unique:clientes',
            'direccion' => 'required|string|max:255',
            'telefono' => 'string|max:10',
        ]);

        //Crear un nuevo cliente con los datos validados
        Cliente::create([
            'nombre' => $validatedData['nombre'],
            'cedula' => $validatedData['cedula'],
            'direccion' => $validatedData['direccion'],
            'telefono' => $validatedData['telefono'],
        ]);

        return to_route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
        return view('clientes.edit', [
            'cliente' => $cliente,
            //aqui estoy pasando el id del registro cliente que quiero editar 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //validar los datos ingresados
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:11|unique:clientes,cedula,' . $cliente->id, //esto hace que ignore el campo cedula ya
            //cuando se hace la validacion de uque la cedula sea unica, cuando se va actualizar el controlador hace esa misma validacion
            //con la cedula ya registrada en la db entonces basicamente si no se actualiza la cedula el controlador asumira que esta repetida
            //y por lo tanto dara problemas al retornar la vista que se quiere, pero se actulizaran otras las informaciones.
            'direccion' => 'required|string|max:255',
            'telefono' => 'string|max:10',
        ]);

        $cliente->update([
            'nombre' => $validatedData['nombre'],
            'cedula' => $validatedData['cedula'],
            'direccion' => $validatedData['direccion'],
            'telefono' => $validatedData['telefono'],
        ]);

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
        $cliente->delete();
        return to_route('clientes.index');
    }
}
