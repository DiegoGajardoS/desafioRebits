<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}