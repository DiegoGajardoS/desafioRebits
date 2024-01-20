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
}
