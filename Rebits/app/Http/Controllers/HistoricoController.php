<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;

class HistoricoController extends Controller
{   // funcion que lista el registro historico, asociando los usuarios y el vehiculo
    public function listarHistoricos(){

    $historicos = Historico::with('usuario','vehiculo')->get();
    return view('historicos',compact('historicos'));
    }
}
