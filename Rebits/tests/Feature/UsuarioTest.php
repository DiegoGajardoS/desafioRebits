<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Usuario;

class UsuarioTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    // Función que crea un usuario con éxito
    public function test_crearUsuario(){

        //Realizar petición para crear un usuario
        $response = $this->post(route('crearUsuario'), [
            'txtNombreNew' => 'Nombre Ejemplo',
            'txtApellidosNew' => 'Apellidos Ejemplo',
            'txtCorreoNew' => 'correo@example.com',
        ]);
        //Se devuelve una redireccion y el mensaje
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Usuario creado correctamente');

        // Verificar que en la BD esta el nuevo usuario
        $this->assertDatabaseHas('usuarios', [
        'nombre' => 'Nombre Ejemplo',
        'apellidos' => 'Apellidos Ejemplo',
        'correo' => 'correo@example.com',
        ]);
    }
    // Función que intenta crear un usuario vacío
    public function test_erroresCrearUsuario(){
        //realizar peticion para crear un usuario sin datos
        $response = $this->post(route('crearUsuario'), []);
        //se devuelven los errores
        $response->assertSessionHasErrors(['txtNombreNew', 'txtApellidosNew', 'txtCorreoNew']);
    }
    // Función que edita un usuario con éxito
    public function test_editarUsuarioConExito(){

        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create();

        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarUsuario'), [
            'usuario_id' => $usuario->id,
            'txtNombre' => 'Nombre Ejemplo Editado',
            'txtApellidos' => 'Apellidos Ejemplo Editado',
            'txtCorreo' => 'edit@example.com',
        ]);
        //Se devuelve una redireccion y el mensaje
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Usuario modificado correctamente');

        // Verificar que en la BD se modifica el usuario
        $this->assertDatabaseHas('usuarios', [
        'id' => $usuario->id,
        'nombre' => 'Nombre Ejemplo Editado',
        'apellidos' => 'Apellidos Ejemplo Editado',
        'correo' => 'edit@example.com',
        ]);
    }
    // Función que intenta editar un usuario sin completar los datos del usuario
    public function test_editarUsuarioConError(){

        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create();

        // Realizar la solicitud incompleta para editar usuario
        $response = $this->post(route('editarUsuario'), ['id' => $usuario->id,]);
        //Se devuelven los errores
        $response->assertSessionHasErrors(['txtNombre', 'txtApellidos', 'txtCorreo']);
    }
    // Función que intenta editar un usuario con un correo no válido
    public function test_editarCorreoNoValido(){

        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create();

        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarUsuario'), [
            'usuario_id' => $usuario->id,
            'txtNombre' => 'Nombre Ejemplo Editado',
            'txtApellidos' => 'Apellidos Ejemplo Editado',
            'txtCorreo' => 'correoNoValido',
        ]);
        //Se devuelven los errores
        $response->assertSessionHasErrors('txtCorreo');
    }
    // Función que trae con éxito los usuarios desde la BD, 
    // luego accede a la vista y obtiene los datos en la vista
    public function test_ListarUsuarios()
    {
        // Crear usuarios de prueba
        Usuario::factory()->count(5)->create();

        // Realizar la solicitud para listar usuarios
        $response = $this->get(route('listarUsuarios'));

        // Esperar respuesta exitosa
        $response->assertStatus(200);

        // Cargar vista
        $response->assertViewIs('usuarios');

        // Obtener la variable usuarios de la vista
        $usuariosEnVista = $response->viewData('usuarios');

        // Verificar que la variable usuarios tiene una colección de usuarios
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $usuariosEnVista);

        // Verificar de que la cantidad de usuarios en la vista es igual a la creada inicialmente
        $this->assertCount(5, $usuariosEnVista);
    }
}