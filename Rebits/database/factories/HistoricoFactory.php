<?php

namespace Database\Factories;

use App\Models\Historico;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoricoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usuario = Usuario::inRandomOrder()->first();
        $vehiculo = Vehiculo::inRandomOrder()->first();
        return [
            'vehiculo_id' => $vehiculo->id,
            'usuario_id' => $usuario->id,
        ];
    }
}
