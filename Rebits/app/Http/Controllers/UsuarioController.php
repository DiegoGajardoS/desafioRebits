<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
class UsuarioController extends Controller
{
    public function listarUsuarios(){

        $usuarios = Usuario::all();
        return view('usuarios')->with('usuarios',$usuarios);
    }

    public function editarUsuario(Request $request){

        try {

            $usuario = Usuario::find($request->usuario_id);

            $usuario->update([
            'nombre' => $request->txtNombre,
            'apellidos' => $request->txtApellidos,
            'correo' => $request->txtCorreo,
            ]);

            return back()->with("Correcto","Usuario modificado correctamente");
        } catch (\Throwable $th) {
            return back()->with("Error","Error al modificar datos del vehiculo");
        }
    }

    public function crearUsuario(Request $request){
        try {
            $nuevoUsuario = new Usuario([
            'nombre' => $request->txtNombreNew,
            'apellidos' => $request->txtApellidosNew,
            'correo' => $request->txtCorreoNew,
            ]);
            //guardar vehiculo nuevo
            $nuevoUsuario->save();

            return back()->with("Correcto","Usuario creado correctamente");
        } catch (\Throwable $th) {
            return back()->with("Error","Error al guardar nuevo usuario");
        }
    }
}
