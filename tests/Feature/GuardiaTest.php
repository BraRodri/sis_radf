<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Guardia;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuardiaTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function indexGuardia()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/guardia');

        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.guardia.index');
    }

    /** @test  */
    public function crearGuardia()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/guardia/crear', [
            'fecha_desde' => '2021-01-02',
            'hora_desde' => '10:02',
            'fecha_hasta' => '2021-01-02',
            'hora_hasta' => '10:02',
        ]);

        $response->assertStatus(200);
        $response->assertOk();
    }

    /** @test  */
    public function obtenerGuardia()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        Guardia::factory(2)->create([
            'user_id' => 1
        ]);

        $response = $this->get('/guardia/obtener');
        $response->assertStatus(200);
        $response->assertOk();
    }

    /** @test  */
    public function eliminarGuardia()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        Guardia::factory(2)->create([
            'user_id' => 1
        ]);

        $response = $this->post('/guardia/eliminar', [
            'idGuarida' => 1
        ]);
        $response->assertStatus(200);
        $response->assertOk();
        $this->assertDatabaseCount('guardias', 1);
    }
}
