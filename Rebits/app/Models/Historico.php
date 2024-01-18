<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $fillable = ['vehiculo_id', 'usuario_id'];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
