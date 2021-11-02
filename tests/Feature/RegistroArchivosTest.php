<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Archives;
use App\Models\Archives_groups;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistroArchivosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function agregarArchivos()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/registro/archivos/agregar', [
            'image' => UploadedFile::fake()->image('image.jepg', 600, 600)
        ]);

        $response->assertOk();
        $response->assertStatus(200);

        //$content = json_decode($response->getContent());
        //dd($content);
        //$response->assertExactJson([$response->getContent()]);
        //$response->assertJsonStructure($response->getContent());
    }

    /** @test  */
    public function insertArchivo()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->post('/registro/archivos/registrar', [
            'name' => 'tal tal',
            'nombreArchivos' => ['siuu'],
            'typeArchivos' => ['image']
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasAll(['error' => 'success']);
        $response->assertRedirect('registro/historial');
    }

    /** @test  */
    public function verConjuntoArchivos()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->actingAs($user);

        Archives::factory()
        ->create([
            'user_id' => 1
        ]);
        Archives_groups::factory(3)->create(['archive_id' => 1]);

        $response = $this->get('/registro/archivos/ver/' . 1);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.registro.verArchivos');
        $this->assertDatabaseCount('archives', 1);
        $this->assertDatabaseCount('archives_groups', 3);
    }
}
