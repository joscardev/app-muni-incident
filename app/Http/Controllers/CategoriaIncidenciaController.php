<?php

namespace App\Http\Controllers;

use App\Models\categoriaIncidencia;
use Illuminate\Http\Request;

class CategoriaIncidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categoriaIncidencia::all();
        return view('categoriaI.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoriaI.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        categoriaIncidencia::create($request->all());
        return redirect()->route('categoriaI.index')->with('success', 'Departamento creado con éxito.');
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
        $categoria = categoriaIncidencia::find($id);
        return view('categoriaI.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' =>'required|string|max:255',
        ]);

        $categoria = categoriaIncidencia::find($id);
        $categoria->update($request->all());
        return redirect()->route('categoriaI.index')->with('success', 'Departamento actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categoriaIncidencia::destroy($id);
        return redirect()->route('categoriaI.index')->with('success', 'Departamento eliminado con éxito.');
    }
}
