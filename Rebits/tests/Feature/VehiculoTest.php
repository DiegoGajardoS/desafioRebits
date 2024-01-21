<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Usuario;
use App\Models\Vehiculo;
use App\Models\Historico;
use Illuminate\Support\Facades\DB;

class VehiculoTest extends TestCase{

	use RefreshDatabase;
    // Función que prueba con éxito la creación de un vehículo
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

        //Se devuelve una redireccion
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Vehiculo creado correctamente');

        // Verificar que en la BD esta el nuevo auto
        $this->assertDatabaseHas('vehiculos', [
        			'marca' => 'MarcaEjemplo',
                    'modelo' => 'ModeloEjemplo',
                    'anho' => '2003',
                    'duenho_id' => $usuario->id,
                    'precio' => '23000000',
        ]);
    	// Obtener el ID del vehículo creado
    	$idVehiculoCreado = Vehiculo::where('marca', 'MarcaEjemplo')->value('id');

    	// Verificar que se guarda en el registro historico
    	$this->assertDatabaseHas('historicos',[
    				'vehiculo_id' => $idVehiculoCreado,
    				'usuario_id' => $usuario->id ]);
	}
    // Función que intenta crear un vehículo vacío
	public function test_crearVehiculoError(){
		
        // Peticion para crear un vehiculo
        $response = $this->post(route('crearVehiculo'), [
			    	]);
        //Se devuelven los errores
        $response->assertSessionHasErrors(['txtMarcaNew', 'txtModeloNew','txtAnhoNew','txtdueno_idNew','txtdueno_idNew','txtPrecioNew']);
	}
    // Función que intenta editar un vehículo con datos incompletos, sólo especifica la marca
	public function test_editarVehiculoConError(){
		$user = Usuario::factory()->create();
        // Crear un usuario de prueba
        $vehiculo = Vehiculo::factory()->create();

        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarVehiculo'), ['txtMarca' => 'MarcaEdit',]);
        
        //Se devuelven los errores menos el error del campo marca
        $response->assertSessionHasErrors(['txtModelo','txtAnho','txtdueno_id','txtPrecio']);
    }
    // Función que edita un vehículo con éxito
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
        //Se devuelve una redireccion y el mensaje
        $response->assertStatus(302);
        $response->assertSessionHas("Correcto","Vehiculo modificado correctamente");

        // Verificar que en la BD se modifica el vehiculo
        $this->assertDatabaseHas('vehiculos', [
        'id' => $vehiculo->id,
        'marca' => 'MarcaEdit',
        'modelo' => 'ModeloEdit',
        'anho' => '2007',
        'duenho_id' => $vehiculo->duenho_id,
        'precio' => '254553'
        ]);
    }
    // Funcion que trae los vehículos desde la BD
    public function test_ListarVehiculos()
    {
        // Crear usuarios, vehículos y registros históricos
        Usuario::factory()->count(5)->create();
        Vehiculo::factory()->count(10)->create();
        Historico::factory()->count(14)->create();

        // Realizar la solicitud para listar vehículos
        $response = $this->get(route('listarVehiculos'));

        // Verificar que la solicitud fue exitosa
        $response->assertStatus(200);

        // Verificar que la vista vehículos carga
        $response->assertViewIs('vehiculos');

        // Obtener las variables 'vehiculos' y 'usuarios' de la vista
        $vehiculosEnVista = $response->viewData('vehiculos');
        $usuariosEnVista = $response->viewData('usuarios');

        // Verificar que las variables son colecciones
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $vehiculosEnVista);
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $usuariosEnVista);

        // Verificar que la cantidad de vehículos en la vista es igual a la creada inicialmente
        $this->assertCount(10, $vehiculosEnVista);

        // Verificar que la cantidad de usuarios en la vista es igual a la creada inicialmente
        $this->assertCount(5, $usuariosEnVista);
    }

    
}