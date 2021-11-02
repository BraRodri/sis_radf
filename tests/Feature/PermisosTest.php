<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermisosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function indexPermisos()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/permisos/view');

        $response->assertOk();
        $response->assertStatus(200);
        $this->assertDatabaseCount('permisos', 0);
    }

    /** @test  */
    public function insertPermiso()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/permisos/crear', [
            'user' => $user->id,
            'names' => 'Cessar Centeno',
            'document' => 1090776555,
            'telefono' => 317889990,
            'guarnicion' => 1,
            'batallon' => 'BAS30 BATALLON DE SERVICIOS N° 30',
            'fecha_salida' => '2021-01-04',
            'hora_salida' => '10:02',
            'fecha_entrada' => '2021-01-04',
            'hora_entrada' => '11:02',
            'destino' => 'Tibu',
            'motivo' => 'Descripción del motivo'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('permisos', 1);
        $response->assertRedirect('/permisos/view');

    }
}
