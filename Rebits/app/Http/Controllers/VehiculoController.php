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

    // Función que trae todos los vehiculos de la BD
    public function listarVehiculos(){
    
        // Almacenar los vehiculos junto a los usuarios dueños y los dueños historicos
        $vehiculos = Vehiculo::with('dueno', 'historicos.usuario')->get();
        $usuarios = Usuario::all();
        return view('vehiculos', compact('vehiculos','usuarios'));
    }
    // Función que edita un vehículo, no se solicita id, este se manda automáticamente desde la vista
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
            // Si falta algun campo se devuelve el error respectivo
            if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with("Error", "Error al registrar un vehiculo, por favor verifique que completó todos los campos necesarios")
                ->with('message.duration', 5);
            }else{
                // Si no hay errores se almacena el vehículo antes de la edición y su dueño
                $vehiculoAntes = Vehiculo::find($request->vehiculo_id);
                $duenhoAntes = $vehiculoAntes->duenho_id;
                // Se actualiza el vehículo
                $vehiculoAntes->update([
                'marca' => $request->txtMarca,
                'modelo' => $request->txtModelo,
                'anho' => $request->txtAnho,
                'duenho_id' => $request->txtdueno_id,
                'precio' => $request->txtPrecio,
                ]);
                // Se almacena el vehículo editado y el dueño registrado en el edit
                $vehiculoDespues = Vehiculo::find($request->vehiculo_id);
                $duenhoDespues = $vehiculoDespues->duenho_id;
                //Si el dueño del vehículo cambia, se agrega al registro histórico
                if($duenhoAntes != $duenhoDespues){
                    Historico::create([
                    'vehiculo_id' => $request->vehiculo_id,
                    'usuario_id' => $duenhoDespues,
                ]);
                }
                // Se devuelve el mensaje de éxito
                return back()->with("Correcto","Vehiculo modificado correctamente");
            }
            

        } catch (\Throwable $th) {
           return back()->with("Error","Error al modificar datos del vehiculo");
        }

    }
    // Función que crea un vehículo
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
            // Si falta algun campo se devuelve el error respectivo
            if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with("Error", "Error al registrar un vehiculo, por favor verifique que completó todos los campos necesarios")
                ->with('message.duration', 5);
            }else{
                // Si no hay errores se crea un nuevo vehículo
                $nuevoVehiculo = new Vehiculo([
                'marca' => $request->txtMarcaNew,
                'modelo' => $request->txtModeloNew,
                'anho' => $request->txtAnhoNew,
                'duenho_id' => $request->txtdueno_idNew,
                'precio' => $request->txtPrecioNew,
                ]);
                //Guardar vehículo nuevo
                $nuevoVehiculo->save();

                //Guardar en el registro histórico
                Historico::create([
                    'vehiculo_id' => $nuevoVehiculo->id,
                    'usuario_id' => $request->txtdueno_idNew,
                ]);
                // Se devuelve el mensaje de éxito
                return back()->with("Correcto","Vehiculo creado correctamente");
                }
            
        } catch (\Throwable $th) {
            
            return back()->with("Error","Error al guardar nuevo vehiculo");
            
        }
    }
}
