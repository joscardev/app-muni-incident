<?php

namespace App\Http\Controllers;

use App\Models\categoriaIncidencia;
use App\Models\estadoIncidencia;
use App\Models\incidencia;
use App\Models\User;
use App\Models\prioridadIncidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = incidencia::with(['estado', 'prioridad', 'categoria', 'creador', 'asignado'])->get();
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
        $users = User::role('Técnico de Soporte')->get();

        return view('incidencia.create', compact('estados', 'prioridades', 'categorias', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado_id' => 'exists:estado_incidencias,id',
            'prioridad_id' => 'exists:prioridad_incidencias,id',
            'categoria_id' => 'exists:categoria_incidencias,id',
            'asignado_a' => 'exists:users,id'
        ]);

        // Añadir creado_por al request antes de crear la incidencia
        $data = $request->all();
        $data['creado_por'] = auth()->user()->id;

        if ($request->fails()) {
            Log::error('Validation failed', $request->errors());
        }

        incidencia::create($data);

        return redirect()->route('incidencias.index')->with('success', 'Incidencia creada con éxito.');
    } */

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado_id' => 'nullable|integer|exists:estado_incidencias,id',
            'prioridad_id' => 'nullable|integer|exists:prioridad_incidencias,id',
            'categoria_id' => 'nullable|integer|exists:categoria_incidencias,id',
            'asignado_a' => 'nullable|integer|exists:users,id'
        ]);

        // Añadir creado_por al request antes de crear la incidencia
        $data = $request->all();
        $data['creado_por'] = auth()->user()->id;

        // Crear la incidencia
        incidencia::create($data);

        return redirect()->route('incidencia.index')->with('success', 'Incidencia creada con éxito.');
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
        //crea el metodo destrosy
        $incidencia = incidencia::find($id);
        $incidencia->delete();
        return redirect()->route('incidencia.index')->with('success', 'Incidencia eliminada con éxito.');
    }
}
