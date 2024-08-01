<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('permisos.index', compact('permissions'));
    }

    public function create()
    {
        return view('permisos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);
        return redirect()->route('permisos.index');
    }

    public function show(Permission $permissions)
    {
        return view('permisos.show', compact('permissions'));
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);

        return view('permisos.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $permissions = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permissions->id,
        ]);

        $permissions->update(['name' => $request->name]);
        return redirect()->route('permisos.index');
    }

    public function destroy($id)
    {
        $permissions = Permission::findOrFail($id);
        $permissions->delete();
        return redirect()->route('permisos.index');
    }
}
