<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Usuario;

class UsuarioTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_crearUsuario(){
        $response = $this->post(route('crearUsuario'), [
            'txtNombreNew' => 'Nombre Ejemplo',
            'txtApellidosNew' => 'Apellidos Ejemplo',
            'txtCorreoNew' => 'correo@example.com',
        ]);
        //se devuelve una redireccion
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Usuario creado correctamente');

        // verificar que en la BD esta el nuevo usuario
        $this->assertDatabaseHas('usuarios', [
        'nombre' => 'Nombre Ejemplo',
        'apellidos' => 'Apellidos Ejemplo',
        'correo' => 'correo@example.com',
        ]);
    }

    public function test_erroresCrearUsuario(){
        $response = $this->post(route('crearUsuario'), []);
        //se devuelven los errores
        $response->assertSessionHasErrors(['txtNombreNew', 'txtApellidosNew', 'txtCorreoNew']);
    }

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
        //se devuelve una redireccion
        $response->assertStatus(302);
        $response->assertSessionHas('Correcto', 'Usuario modificado correctamente');

        // verificar que en la BD se modifica el usuario
        $this->assertDatabaseHas('usuarios', [
        'id' => $usuario->id,
        'nombre' => 'Nombre Ejemplo Editado',
        'apellidos' => 'Apellidos Ejemplo Editado',
        'correo' => 'edit@example.com',
        ]);
    }

    public function test_editarUsuarioConError(){

        // Crear un usuario de prueba
        $usuario = Usuario::factory()->create();

        // Realizar la solicitud para editar usuario
        $response = $this->post(route('editarUsuario'), ['id' => $usuario->id,]);
        //se devuelven los errores
        $response->assertSessionHasErrors(['txtNombre', 'txtApellidos', 'txtCorreo']);
    }

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
        //se devuelven los errores
        $response->assertSessionHasErrors('txtCorreo');
    }
}