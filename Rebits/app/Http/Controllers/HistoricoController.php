<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historico;

class HistoricoController extends Controller
{
    public function listarHistoricos(){

    $historicos = Historico::with('usuario','vehiculo')->get();
    return view('historicos',compact('historicos'));
    }
}
