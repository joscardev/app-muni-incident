<?php

namespace App\Http\Controllers;

use App\Models\prioridadIncidencia;
use Illuminate\Http\Request;

class PrioridadIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prioridad = prioridadIncidencia::all();
        return view('prioridadI.index', compact('prioridad')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prioridadI.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);
        prioridadIncidencia::create($request->all());
        return redirect()->route('prioridadI.index');

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
        $prioridad = prioridadIncidencia::findOrFail($id);
        return view('prioridadI.edit', compact('prioridad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);
        $prioridad = prioridadIncidencia::findOrFail($id);
        $prioridad->update($request->all());
        return redirect()->route('prioridadI.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        prioridadIncidencia::destroy($id);
        return redirect()->route('prioridadI.index');
    }
}
