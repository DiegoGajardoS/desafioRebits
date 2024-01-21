<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Vehiculo;

class VehiculoTest extends TestCase{

	use RefreshDatabase;

	public function test_crearVehiculo(){

		// Crear un usuario de prueba
        $usuario = Usuario::factory()->create();

        // Peticion para crear un vehiculo
        $response = $this->post(route('crearVehiculo'), [
            		'txtMarcaNew' => 'MarcaEjemplo',
                    'txtModeloNew' => 'ModeloEjemplo',
                    'txtAnhoNew' => '2003',
                    'txtdueno_idNew' => $usuario->id,
                    'txtPrecioNew' => '23000000',
        ]);

        //se devuelve una redireccion
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Vehiculo creado correctamente');

        // verificar que en la BD esta el nuevo auto
        $this->assertDatabaseHas('vehiculos', [
        			'marca' => 'MarcaEjemplo',
                    'modelo' => 'ModeloEjemplo',
                    'anho' => '2003',
                    'duenho_id' => $usuario->id,
                    'precio' => '23000000',
        ]);
    	// Obtener el ID del vehículo creado
    	$idVehiculoCreado = Vehiculo::where('marca', 'MarcaEjemplo')->value('id');

    	// verificar que se guarda en el registro historico
    	$this->assertDatabaseHas('historicos',[
    				'vehiculo_id' => $idVehiculoCreado,
    				'usuario_id' => $usuario->id ]);
	}

	public function test_crearVehiculoError(){
		
        // Peticion para crear un vehiculo
        $response = $this->post(route('crearVehiculo'), [
			    	]);
        //se devuelven los errores
        $response->assertSessionHasErrors(['txtMarcaNew', 'txtModeloNew','txtAnhoNew','txtdueno_idNew','txtdueno_idNew','txtPrecioNew']);
	}

	public function test_editarVehiculoConError(){
		$user = Usuario::factory()->create();
        // Crear un usuario de prueba
        $vehiculo = Vehiculo::factory()->create();

        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarVehiculo'), ['txtMarca' => 'MarcaEdit',]);
        
        //se devuelven los errores menos el error del campo marca
        $response->assertSessionHasErrors(['txtModelo','txtAnho','txtdueno_id','txtPrecio']);
    }

    public function test_EditarVehiculoConExito(){

    	$user = Usuario::factory()->create();
        // Crear un usuario de prueba
        $vehiculo = Vehiculo::factory()->create();
        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarVehiculo'), [
        			'vehiculo_id' => $vehiculo->id,
        			'txtMarca' => 'MarcaEdit',
                    'txtModelo' => 'ModeloEdit',
                    'txtAnho' => '2007',
                    'txtdueno_id' => $vehiculo->duenho_id,
                    'txtPrecio' => '254553',
                ]);
        //se devuelve una redireccion
        $response->assertStatus(302);
        $response->assertSessionHas("Correcto","Vehiculo modificado correctamente");

        // verificar que en la BD se modifica el vehiculo
        $this->assertDatabaseHas('vehiculos', [
        'id' => $vehiculo->id,
        'marca' => 'MarcaEdit',
        'modelo' => 'ModeloEdit',
        'anho' => '2007',
        'duenho_id' => $vehiculo->duenho_id,
        'precio' => '254553'
        ]);
    }
}