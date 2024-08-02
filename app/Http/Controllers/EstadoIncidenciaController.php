<?php

namespace App\Http\Controllers;

use App\Models\estadoIncidencia;
use Illuminate\Http\Request;



class EstadoIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = estadoIncidencia::all();
        return view('estadoI.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estadoI.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        estadoIncidencia::create($request->all());
        return redirect()->route('estadoI.index')->with('success', 'Estado creado con éxito.');
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
        $estado = estadoIncidencia::findOrFail($id);
        return view('estadoI.edit', compact('estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);

        $estado = estadoIncidencia::findOrFail($id);
        $estado->update($request->all());
        return redirect()->route('estadoI.index')->with('success', 'Estado actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estado = estadoIncidencia::findOrFail($id);
        $estado->delete();
        return redirect()->route('estadoI.index')->with('success', 'Estado eliminado con éxito.');
    }
}
