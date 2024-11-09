<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\AccesoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\DetalleInformeController;
use App\Http\Controllers\ReportController;


Route::get('/home', function () {
    return view('home');
})->middleware('auth');


//ACCESO

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



//DETALLE_INFORMES

Route::get('/Detalle_informes/show', [DetalleInformeController::class, 'index']);

Route::get('/Detalle_informes/create', [DetalleInformeController::class, 'create']);

Route::get('/Detalle_informes/edit/{detalle_informe}', [DetalleInformeController::class, 'edit']);

Route::post('/Detalle_informes/store', [DetalleInformeController::class, 'store']);

Route::put('/Detalle_informes/update/{detalle_informe}', [DetalleInformeController::class, 'update']);

Route::delete('/Detalle_informes/destroy/{id}', [DetalleInformeController::class, 'destroy']);



//detalle_pedidos

Route::get('/Detalle_pedidos/show', [DetallePedidoController::class, 'index']);

Route::get('/Detalle_pedidos/create', [DetallePedidoController::class, 'create']);

Route::get('/Detalle_pedidos/edit/{detalle_pedido}', [DetallePedidoController::class, 'edit']);

Route::post('/Detalle_pedidos/store', [DetallePedidoController::class, 'store']);

Route::put('/Detalle_pedidos/{detalle_pedido}', [DetallePedidoController::class, 'update'])->name('detalle_pedidos.update');

Route::delete('/Detalle_pedidos/destroy/{id}', [DetallePedidoController::class, 'destroy']);


//EMPLEADOS

// Ruta para mostrar la vista show.blade.php
Route::get('/Empleados/show', [EmpleadoController::class, 'index']);

// Ruta para mostrar la vista create.blade.php
Route::get('/Empleados/create', [EmpleadoController::class, 'create']);

// Ruta para mostrar la vista update.blade.php
Route::get('/Empleados/edit/{empleado}', [EmpleadoController::class, 'edit']);

// Ruta para insertar Empleado
Route::post('/Empleados/store', [EmpleadoController::class, 'store'])->name('empleados.store');

// Ruta para modificar Empleado
Route::put('/Empleados/update/{empleado}', [EmpleadoController::class, 'update']);

// Ruta para eliminar empleado
Route::delete('/Empleados/destroy/{id}', [EmpleadoController::class, 'destroy']);


//INFORMES

Route::get('/Informes/show', [InformeController::class, 'index']);

Route::get('/Informes/create', [InformeController::class, 'create']);

Route::get('/Informes/edit/{informe}', [InformeController::class, 'edit']);

Route::post('/Informes/store', [InformeController::class, 'store']);

Route::put('/Informes/update/{informe}', [InformeController::class, 'update']);

Route::delete('/Informes/destroy/{id}', [InformeController::class, 'destroy']);


//MENÚS

Route::get('/Menus/show', [MenuController::class, 'index']);

Route::get('//Menus/create', [MenuController::class, 'create']);

Route::get('/Menus/edit/{menu}', [MenuController::class, 'edit']);

Route::post('/Menus/store', [MenuController::class, 'store']);

Route::put('/Menus/update/{menu}', [MenuController::class, 'update']);

Route::delete('/Menus/destroy/{id}', [MenuController::class, 'destroy']);



//MESAS

Route::get('/Mesas/show', [MesaController::class, 'index']);

Route::get('/Mesas/create', [MesaController::class, 'create']);

Route::get('/Mesas/edit/{mesa}', [MesaController::class, 'edit']);

Route::post('/Mesas/store', [MesaController::class, 'store']);

Route::put('/Mesas/update/{mesa}', [MesaController::class, 'update']);

Route::delete('/Mesas/destroy/{id}', [MesaController::class, 'destroy']);



//PAGOS

Route::get('/Pagos/show', [PagoController::class, 'index']);

Route::get('/Pagos/create', [PagoController::class, 'create']);

Route::get('/Pagos/edit/{pago}', [PagoController::class, 'edit']);

Route::post('/Pagos/store', [PagoController::class, 'store']);

Route::put('/Pagos/update/{pago}', [PagoController::class, 'update']);

Route::delete('/Pagos/destroy/{id}', [PagoController::class, 'destroy']);


//PEDIDOS

Route::get('/Pedidos/show', [PedidoController::class, 'index']);

Route::get('/Pedidos/create', [PedidoController::class, 'create']);

Route::get('/Pedidos/edit/{pedido}', [PedidoController::class, 'edit']);

Route::post('/Pedidos/store', [PedidoController::class, 'store']);

Route::put('/Pedidos/update/{pedido}', [PedidoController::class, 'update']);

Route::delete('/Pedidos/destroy/{id}', [PedidoController::class, 'destroy']);




//PLATOS

Route::get('/Platos/show', [PlatoController::class, 'index']);

Route::get('/Platos/create', [PlatoController::class, 'create']);

Route::get('/Platos/edit/{plato}', [PlatoController::class, 'edit']);

Route::post('/Platos/store', [PlatoController::class, 'store']);

Route::put('/Platos/update/{plato}', [PlatoController::class, 'update']);

Route::delete('/Platos/destroy/{id}', [PlatoController::class, 'destroy']);


//PRODUCTOS

Route::get('/Productos/show', [ProductoController::class, 'index']);

Route::get('/Productos/create', [ProductoController::class, 'create']);

Route::get('/Productos/edit/{producto}', [ProductoController::class, 'edit']);

Route::post('/Productos/store', [ProductoController::class, 'store']);

Route::put('/Productos/update/{producto}', [ProductoController::class, 'update']);

Route::delete('/Productos/destroy/{id}', [ProductoController::class, 'destroy']);



//PROMOCIONES

Route::get('/Promociones/show', [PromocionController::class, 'index']);

Route::get('/Promociones/create', [PromocionController::class, 'create']);

Route::get('/Promociones/edit/{promocion}', [PromocionController::class, 'edit']);

Route::post('/Promociones/store', [PromocionController::class, 'store']);

Route::put('/Promociones/update/{promocion}', [PromocionController::class, 'update']);

Route::delete('/Promociones/destroy/{id}', [PromocionController::class, 'destroy']);



//RESERVACIONES

Route::get('/Reservaciones/show', [ReservacionController::class, 'index']);

Route::get('/Reservaciones/create', [ReservacionController::class, 'create']);

Route::get('Reservaciones/edit/{reservacion}', [ReservacionController::class, 'edit']);

Route::post('Reservaciones/store', [ReservacionController::class, 'store']);

Route::put('Reservaciones/update/{reservacion}', [ReservacionController::class, 'update']);

Route::delete('Reservaciones/destroy/{id}', [ReservacionController::class, 'destroy']);


Route::get('/reports1', [ReportController::class,'reporteUno']);
Route::get('/reports2', [ReportController::class,'reporteDos']);
Route::get('/reports3', [ReportController::class,'reporteTres']);
Route::get('/reports4', [ReportController::class,'reporteCuatro']);
Route::get('/reports5', [ReportController::class,'reporteCinco']);
Route::get('/reports6', [ReportController::class,'reporteSeis']);
Route::get('/reports7', [ReportController::class,'reporteSiete']);
Route::get('/reports8', [ReportController::class,'reporteOcho']);
Route::get('/reports9', [ReportController::class,'reporteNueve']);
Route::get('/reports10', [ReportController::class,'reporteDiez']);
Route::get('/reports11', [ReportController::class,'reporteOnce']);
Route::get('/reports12', [ReportController::class,'reporteDoce']);
Route::get('/reports13', [ReportController::class,'reporteTrece']);
Route::get('/reports14', [ReportController::class,'reporteCatorce']);
Route::get('/reports15', [ReportController::class,'reporteQuince']);




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
