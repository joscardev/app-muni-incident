<?php

namespace App\Http\Controllers;

use App\Models\categoriaIncidencia;
use App\Models\estadoIncidencia;
use App\Models\incidencia;
use App\Models\prioridadIncidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = incidencia::with(['estado','prioridad','categoria'])->get();
        return view('incidencia.index', compact('incidencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = estadoIncidencia::all();
        $prioridades = prioridadIncidencia::all();
        $categorias = categoriaIncidencia::all();
        return view('incidencia.create', compact('estados', 'prioridades', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado_id' => 'required|exists:estado_incidencias,id',
            'prioridad_id' => 'required|exists:prioridad_incidencias,id',
            'categoria_id' => 'required|exists:categoria_incidencias,id',
        ]);
        Incidencia::create($request->all());
        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada con éxito.');
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
