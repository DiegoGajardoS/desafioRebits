<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Historico::factory(20)->create(); 
        // Completar el registro histórico con los vehículos creados con el seeder
        // ya que en el seeder de vehículos se crean vehículos sin guardar en el registro histórico
        DB::statement('
            INSERT INTO historicos (vehiculo_id, usuario_id, created_at, updated_at)
            SELECT id AS vehiculo_id, duenho_id AS usuario_id, NOW(), NOW()
            FROM vehiculos
        ');

    }
}
