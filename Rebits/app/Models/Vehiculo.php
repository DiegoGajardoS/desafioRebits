<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = ['marca', 'modelo', 'anho', 'dueno_id', 'precio'];

    public function dueno()
    {
        return $this->belongsTo(Usuario::class, 'dueno_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }
}