<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = \Spatie\Permission\Models\Permission::all();

        return view('permissions.index', compact('permissions'));
    }
}
