<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Obtiene todos los roles disponibles
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255', // Uncommented unique validation for email
            'password' => 'required|string|min:6|confirmed', // Changed nullable to required
            'role' => 'required|exists:roles,name', // Valida que el rol sea un ID existente en la base de datos
        
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);
    
        return redirect()->route('usuarios.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        
        $users = User::findOrFail($id);
        $roles = Role::all(); // Obtiene todos los roles disponibles
        return view('usuarios.edit', compact('users', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Valida que el rol sea un ID existente en la base de datos
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());

        $user->syncRoles($request->role);

        return redirect()->route('usuarios.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}
