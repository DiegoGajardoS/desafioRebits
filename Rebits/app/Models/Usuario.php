<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'correo'];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'dueno_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }
}