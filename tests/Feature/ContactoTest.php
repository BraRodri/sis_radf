<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactoTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function indexContacto()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/contacto');

        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.contacto.index');
    }

    /** @test  */
    public function insertContacto()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/contacto/create', [
            'type' => 'Consultas',
            'name' => "Andres Rodea",
            'email' => 'EmailExample@mail.com',
            'phone' => '317 678998',
            'message' => 'Descripción de los comentarios'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/contacto');
        $response->assertSessionHasAll(['error' => 'success']);
    }

    /** @test  */
    public function viewContacto()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/contacto/view');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.contacto.view');
    }
}
