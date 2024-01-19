<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'correo'];

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'duenho_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }
}