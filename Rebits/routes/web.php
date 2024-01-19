<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
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


Route::get('/vehiculos',[VehiculoController::class,"listarVehiculos"])->name('listarVehiculos');;


Route::get('/users', function () {
    return view('usuarios');
});
