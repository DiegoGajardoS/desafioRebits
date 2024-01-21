<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HistoricoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

// ruta para listar los vehiculos
Route::get('/vehiculos',[VehiculoController::class,"listarVehiculos"])->name('listarVehiculos');

// ruta para modificar un vehiculo
Route::post('/editar-vehiculo',[VehiculoController::class,"editarVehiculo"])->name('editarVehiculo');

// ruta para crear un vehiculo
Route::post('/crear-vehiculo',[VehiculoController::class,"CrearVehiculo"])->name('crearVehiculo');

// ruta para listar los usuarios
Route::get('/usuarios',[UsuarioController::class,"listarUsuarios"])->name('listarUsuarios');

// ruta para modificar un usuario
Route::post('/editar-usuario',[UsuarioController::class,"editarUsuario"])->name('editarUsuario');

// ruta para crear un usuario
Route::post('/crear-usuario',[UsuarioController::class,"crearUsuario"])->name('crearUsuario');

// ruta para ver el registro historico
Route::get('/historicos',[HistoricoController::class,"listarHistoricos"])->name('listarHistoricos');
