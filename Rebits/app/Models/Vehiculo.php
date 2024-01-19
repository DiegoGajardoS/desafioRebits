<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['marca', 'modelo', 'anho', 'duenho_id', 'precio'];

    public function dueno()
    {
        return $this->belongsTo(Usuario::class, 'duenho_id');
    }

    public function historicos()
    {
        return $this->hasMany(Historico::class);
    }
}