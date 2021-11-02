<?php

namespace Tests\Feature;

use App\Models\Recepcion;
use Carbon\Carbon;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function index_usuarios()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/usuarios');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.usuarios.index');
    }

    /** @test  */
    public function create_user()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/create', [
            'route_name' => 'recepcion',
            'documento' => '1090887121',
            'nombres' => 'Julian Becerra',
            'grado' => 'Oficial',
            'distintivo' => 'Subteniente',
            'arma' => "Infantería 'paso de vencedores'",
            'brigada' => 'TRIGESIMA BRIGADA N° 30 CUCUTA DIV02',
            'correo_personal' => 'julian@mail.com',
            'correo_corporativo' => 'juliCor@mail.com',
            'estado' => 'Activo',
            'rol' => 1
        ]);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.recepcion.index');
    }

    /** @test  */
    public function viewUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/usuarios/view/1');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.usuarios.edit');
    }

    /** @test  */
    public function updatedUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/updated', [
            'idUser' => $user->id,
            'documento' => 109444333,
            'nombres' => 'Juancho',
            'grado' => 'Oficial',
            'distintivo' => 'Subteniente',
            'arma' => "Infantería 'paso de vencedores'",
            'brigada' => 'TRIGESIMA BRIGADA N° 30 CUCUTA DIV02',
            'correo_personal' => 'andres@mail.com',
            'correo_corporativo' => 'andresCor@mail.com',
            'estado' => 'Activo',
            'rol'  => 1
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasAll([
            'error' => 'success_updated',
        ]);
    }

    /** @test  */
    public function deleteUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/usuarios/delete', [
            'idUser' => 1
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasAll(['error' => 'delete']);
        $this->assertDatabaseCount('users', 0);
    }
}
