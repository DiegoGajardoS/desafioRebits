<?php
namespace Database\Factories;
use App\Models\Vehiculo;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usuario = Usuario::inRandomOrder()->first();
        return [
            'marca' => $this->faker->word,
            'modelo' => $this->faker->word,
            'anho' => $this->faker->numberBetween(1960, 2024), 
            'duenho_id' => $usuario->id,
            'precio' => $this->faker->randomNumber(8),
        ];
    }
}
