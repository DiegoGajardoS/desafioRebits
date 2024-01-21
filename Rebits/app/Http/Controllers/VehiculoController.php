<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehiculo;
use App\Models\Usuario;
use App\Models\Historico;
use Illuminate\Support\Facades\Validator;
class VehiculoController extends Controller
{
    public function listarVehiculos(){
    
       
        $vehiculos = Vehiculo::with('dueno', 'historicos.usuario')->get();
        $usuarios = Usuario::all();
        return view('vehiculos', compact('vehiculos','usuarios'));
    }

    public function editarVehiculo(Request $request){
        try {
            // Validar los campos del formulario
            $validator = Validator::make($request->all(), [
                    'txtMarca' => 'required',
                    'txtModelo' => 'required',
                    'txtAnho' => 'required',
                    'txtdueno_id' => 'required',
                    'txtPrecio' => 'required',
            ]);
            if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with("Error", "Error al registrar un vehiculo, por favor verifique que completó todos los campos necesarios")
                ->with('message.duration', 5);
            }else{
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
            }
            

        } catch (\Throwable $th) {
           return back()->with("Error","Error al modificar datos del vehiculo");
        }

    }

    public function crearVehiculo(Request $request){
        try {

            // Validar los campos del formulario
            $validator = Validator::make($request->all(), [
                    'txtMarcaNew' => 'required',
                    'txtModeloNew' => 'required',
                    'txtAnhoNew' => 'required',
                    'txtdueno_idNew' => 'required',
                    'txtPrecioNew' => 'required',
            ]);
            if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with("Error", "Error al registrar un vehiculo, por favor verifique que completó todos los campos necesarios")
                ->with('message.duration', 5);
            }else{
                $nuevoVehiculo = new Vehiculo([
                'marca' => $request->txtMarcaNew,
                'modelo' => $request->txtModeloNew,
                'anho' => $request->txtAnhoNew,
                'duenho_id' => $request->txtdueno_idNew,
                'precio' => $request->txtPrecioNew,
                ]);
                //guardar vehiculo nuevo
                $nuevoVehiculo->save();

                //guardar en el registro historico
                Historico::create([
                    'vehiculo_id' => $nuevoVehiculo->id,
                    'usuario_id' => $request->txtdueno_idNew,
                ]);
                return back()->with("Correcto","Vehiculo creado correctamente");
                }
            
        } catch (\Throwable $th) {

            return back()->with("Error","Error al guardar nuevo vehiculo");
            
        }
    }
}
