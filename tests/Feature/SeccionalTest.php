<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Brigada_users;
use App\Models\Batallones_users;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeccionalTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function brigada()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/seccional/brigada');

        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.seccional.brigada');
    }

    /** @test  */
    public function batallones()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/seccional/batallones');

        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.seccional.batallones');
    }

    /** @test  */
    public function createBrigada()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/seccional/brigada/user/create', [
            'brigada_id' => 'B1',
            'user_id' => 1
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('brigada_users', 1);
        $response->assertSessionHasAll(['error' => 'success']);
    }

    /** @test  */
    public function deleteBrigada()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        Brigada_users::factory()->create([
            'brigada_id' => 'B1',
            'user_id' => $user->id,
        ]);
        $response = $this->get('/seccional/brigada/user/delete/' . 1);

        $response->assertStatus(302);
        $this->assertDatabaseCount('brigada_users', 0);
        $response->assertSessionHasAll(['error' => 'delete']);
    }

    /** @test  */
    public function createBatallon()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/seccional/batallones/user/create', [
            'batallon_id' => 'B5',
            'user_id' => 1
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('batallon_users', 1);
        $response->assertSessionHasAll(['error' => 'success']);
    }

    /** @test  */
    public function deleteBatallon()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        Batallones_users::factory()->create([
            'batallon_id' => 'B1',
            'user_id' => $user->id,
        ]);
        $response = $this->get('/seccional/batallones/user/delete/' . 1);

        $response->assertStatus(302);
        $this->assertDatabaseCount('batallon_users', 0);
        $response->assertSessionHasAll(['error' => 'delete']);
    }
}
