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

class RecepcionTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function index_reception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/recepcion');
        $response->assertStatus(200);
    }

    /** @test  */
    public function store_reception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/recepcion', [
            'user_id' => $user->id,
            'documento_user' => 1090887778,
            'hora_entrada' => '10:30',
            'hora_salida' => null,
            'motivo_ingreso' => 'Siuuu',
            'motivo_egreso' => null,
            'imagen' => "tla",
            'created_at' => Carbon::now('America/Bogota'),
            'updated_at' => null
        ]);
        $response->assertOk();
        $response->assertStatus(200);
    }

    /** @test */
    public function update_reception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        Recepcion::factory()->create([
            'user_id' => $user->id,
            'documento_user' => 1087665443
        ]);
        $response = $this->post('/recepcion/update/' . 1, [
            'hora_salida' => '11:30',
            'motivo_egreso' => 'ltaltat',
            'updated_at' =>  Carbon::now('America/Bogota'),
        ]);
        $response->assertSessionHasAll([
            'error' => 'success_updated',
        ]);

        $response->assertStatus(302);
    }

    /** @test  */
    public function historyCountReception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/recepcion/historyCount');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.recepcion.indexCountHistory');
    }

    /** @test  */
    public function historyListReception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/recepcion/historyList/2021-10-10');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.recepcion.indexListHistory');
    }

    /** @test  */
    public function historyDetailsReception()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        Recepcion::factory()->create([
            'user_id' => $user->id,
            'documento_user' => 1087665443
        ]);

        $response = $this->get('/recepcion/historyDetails/' . 1);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.recepcion.indexDetailsHistory');
    }
}
