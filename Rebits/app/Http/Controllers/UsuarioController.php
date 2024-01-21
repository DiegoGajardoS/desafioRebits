<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;
class UsuarioController extends Controller
{
    public function listarUsuarios(){

        $usuarios = Usuario::all();
        return view('usuarios')->with('usuarios',$usuarios);
    }

    public function editarUsuario(Request $request){

        try {
            // Validar los campos del formulario
            $validator = Validator::make($request->all(), [
                    'txtNombre' => 'required',
                    'txtApellidos' => 'required',
                    'txtCorreo' => 'required|email',
            ]);
            // En caso de que la validacion falle, se devuelven los errores
            if ($validator->fails()) {
            return back()->with("Error", "Error al modificar datos del usuario, por favor verifique que completó todos los campos necesarios y que el correo se ingresa de la manera correcta")->with('message.duration', 5);;
            }

            //si la validacion es exitosa se guarda el nuevo usuario
            $usuario = Usuario::find($request->usuario_id);

            $usuario->update([
            'nombre' => $request->txtNombre,
            'apellidos' => $request->txtApellidos,
            'correo' => $request->txtCorreo,
            ]);

            return back()->with("Correcto","Usuario modificado correctamente")->with('message.duration', 5);;
        } catch (\Throwable $th) {
            return back()->with("Error","Error al modificar datos del vehiculo")->with('message.duration', 5);;
        }
    }

    public function crearUsuario(Request $request){
        try {
            // Validar los campos del formulario
            $validator = Validator::make($request->all(), [
                    'txtNombreNew' => 'required',
                    'txtApellidosNew' => 'required',
                    'txtCorreoNew' => 'required|email',
            ]);
            // En caso de que la validacion falle, se devuelven los errores

            if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with("Error", "Error al guardar un nuevo usuario, por favor verifique que completó todos los campos necesarios y que el correo se ingresa de la manera correcta")
                ->with('message.duration', 5);
            }else{
                //si la validacion es exitosa se guarda el nuevo usuario
            $nuevoUsuario = new Usuario([
            'nombre' => $request->txtNombreNew,
            'apellidos' => $request->txtApellidosNew,
            'correo' => $request->txtCorreoNew,
            ]);
            $nuevoUsuario->save();

            return back()->with("Correcto","Usuario creado correctamente")->with('message.duration', 5);;
            }        
            
        } catch (\Throwable $th) {
            return back()->with("Error","Error al guardar nuevo usuario")->with('message.duration', 5);;
        }
    }
}
