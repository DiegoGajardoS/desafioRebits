<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Models\Usuario;
use App\Models\Historico;
class VehiculoController extends Controller
{
    public function listarVehiculos(){
    
       
        $vehiculos = Vehiculo::with('dueno', 'historicos.usuario')->get();
        $usuarios = Usuario::all();
        return view('vehiculos', compact('vehiculos','usuarios'));
    }

    public function editarVehiculo(Request $request){
        try {

            $vehiculoAntes = Vehiculo::find($request->vehiculo_id);
            $duenhoAntes = $vehiculoAntes->duenho_id;

            $vehiculoAntes->update([
            'marca' => $request->txtMarca,
            'modelo' => $request->txtModelo,
            'anho' => $request->txtAnho,
            'duenho_id' => $request->txtdueno_id,
            'precio' => $request->txtPrecio,
            ]);

            $vehiculoDespues = Vehiculo::find($request->vehiculo_id);
            $duenhoDespues = $vehiculoDespues->duenho_id;

            //si el duenho del vehiculo cambia, se agrega al registro historico
            if($duenhoAntes != $duenhoDespues){
                Historico::create([
                'vehiculo_id' => $request->vehiculo_id,
                'usuario_id' => $duenhoDespues,
            ]);

            }

            return back()->with("Correcto","Vehiculo modificado correctamente");

        } catch (\Throwable $th) {
           return back()->with("Error","Error al modificar datos del vehiculo");
        }

    }
}
