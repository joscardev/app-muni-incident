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

    public function show(Permission $permission)
    {
        return view('permisos.show', compact('permission'));
    }

    public function edit(Permission $permission)
    {
        return view('permisos.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,' . $permission->id,
        ]);

        $permission->update(['name' => $request->name]);
        return redirect()->route('permisos.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permisos.index');
    }

}
