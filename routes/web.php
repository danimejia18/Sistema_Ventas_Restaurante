<?php

use App\Http\Controllers\AccesoController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta para mostrar la vista show.blade.php
Route::get('/Acceso/show', [AccesoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/Acceso/create', [AccesoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/Acceso/edit/{acceso}', [AccesoController::class, 'edit']);

// Ruta para insertar acceso
Route::post('/Acceso/store', [AccesoController::class, 'store']);

// Ruta para modificar acceso
Route::put('/Acceso/update/{acceso}', [AccesoController::class, 'update']);

// Ruta para eliminar acceso
Route::delete('/Acceso/destroy/{id}', [AccesoController::class, 'destroy']);

