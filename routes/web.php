<?php

use App\Http\Controllers\CategoriaIncidenciaController;
use App\Http\Controllers\ComentarioIncidenciaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EstadoIncidenciaController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PrioridadIncidenciaController;
use App\Http\Controllers\ReporteIncidenciaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
// Route::resource('usuarios', UserController::class);
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::resource('usuarios', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permisos', PermissionController::class);
    Route::resource('departamentos',DepartamentoController::class);
    Route::resource('estadoI',EstadoIncidenciaController::class);
    Route::resource('prioridadI',PrioridadIncidenciaController::class);
    Route::resource('categoriaI',CategoriaIncidenciaController::class);
    Route::resource('incidencia',IncidenciaController::class);
    Route::resource('comentarioI',ComentarioIncidenciaController::class);
    Route::resource('reporteI',ReporteIncidenciaController::class);

});



