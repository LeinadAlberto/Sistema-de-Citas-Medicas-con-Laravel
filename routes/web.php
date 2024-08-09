<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Rutas para el Administrador */
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

/* Rutas para el Administrador - Usuarios */
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth');

Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])
    ->name('admin.usuarios.create')
    ->middleware('auth');

Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])
    ->name('admin.usuarios.store')
    ->middleware('auth');

Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])
    ->name('admin.usuarios.show')
    ->middleware('auth');

Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])
    ->name('admin.usuarios.edit')
    ->middleware('auth');

Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])
    ->name('admin.usuarios.update')
    ->middleware('auth');

Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioController::class, 'confirmDelete'])
    ->name('admin.usuarios.confirmDelete')
    ->middleware('auth');

Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])
    ->name('admin.usuarios.destroy')
    ->middleware('auth');

/* Rutas para el Administrador - Secretarias */

Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])
    ->name('admin.secretarias.index')
    ->middleware('auth');

Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])
    ->name('admin.secretarias.create')
    ->middleware('auth');

Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])
->name('admin.secretarias.store')
->middleware('auth');

Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])
    ->name('admin.secretarias.show')
    ->middleware('auth');
    
