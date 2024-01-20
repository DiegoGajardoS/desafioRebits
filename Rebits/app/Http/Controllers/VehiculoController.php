<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
class VehiculoController extends Controller
{
    public function listarVehiculos()
    {
        
        $vehiculos = Vehiculo::with('dueno', 'historicos.usuario')->get();
        return view('vehiculos', compact('vehiculos'));
    }
}
