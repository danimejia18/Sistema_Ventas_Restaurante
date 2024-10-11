<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccesoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProductoController;


Route::get('/home', function () {
    return view('home');
})->middleware('auth');

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

//CATEGORIAS

// Ruta para mostrar la vista show.blade.php
Route::get('/Categorias/show', [CategoriaController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/Categorias/create', [CategoriaController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/Categorias/edit/{categoria}', [CategoriaController::class, 'edit']);

// Ruta para insertar categoria
Route::post('/Categorias/store', [CategoriaController::class, 'store']);

// Ruta para modificar categoria
Route::put('/Categorias/update/{categoria}', [CategoriaController::class, 'update']);

// Ruta para eliminar categoria
Route::delete('/Categorias/destroy/{id}', [CategoriaController::class, 'destroy']);

//CLIENTES

// Ruta para mostrar la vista show.blade.php
Route::get('/Clientes/show', [ClienteController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/Clientes/create', [ClienteController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/Clientes/edit/{cliente}', [ClienteController::class, 'edit']);

// Ruta para insertar cliente
Route::post('/Clientes/store', [ClienteController::class, 'store']);

// Ruta para modificar cliente
Route::put('/Clientes/update/{cliente}', [ClienteController::class, 'update']);

// Ruta para eliminar cliente
Route::delete('/Clientes/destroy/{id}', [ClienteController::class, 'destroy']);

//EMPLEADOS

// Ruta para mostrar la vista show.blade.php
Route::get('/Empleados/show', [EmpleadoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/Empleados/create', [EmpleadoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/Empleados/edit/{empleado}', [EmpleadoController::class, 'edit']);

// Ruta para insertar Empleado
Route::post('/Empleados/store', [EmpleadoController::class, 'store']);

// Ruta para modificar Empleado
Route::put('/Empleados/update/{empleado}', [EmpleadoController::class, 'update']);

// Ruta para eliminar empleado
Route::delete('/Empleados/destroy/{id}', [EmpleadoController::class, 'destroy']);

//Platos

Route::get('Platos/show', [PlatoController::class, 'index']);

Route::get('Platos/create', [PlatoController::class, 'create']);

Route::get('Platos/edit/{plato}', [PlatoController::class, 'edit']);

Route::post('Platos/store', [PlatoController::class, 'store']);

Route::put('Platos/update/{plato}', [PlatoController::class, 'update']);

Route::delete('Platos/destroy/{id}', [PlatoController::class, 'destroy']);

//Productos

Route::get('Productos/show', [ProductoController::class, 'index']);

Route::get('Productos/create', [ProductoController::class, 'create']);

Route::get('Productos/edit/{producto}', [ProductoController::class, 'edit']);

Route::post('Productos/store', [ProductoController::class, 'store']);

Route::put('Productos/update/{producto}', [ProductoController::class, 'update']);

Route::delete('Productos/destroy/{id}', [ProductoController::class, 'destroy']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');