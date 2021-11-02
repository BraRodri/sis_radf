<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Archives_groups;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SIS_RADFTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function indexDeteccionFacial()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/deteccionFacial');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.sisradf.deteccionFacial.index');
    }

    /** @test  */
    public function indexDeteccionFacialSearch()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/deteccionFacial', [
            'fecha_inicial' => '2020-01-02',
            'fecha_final' => '2020-01-02'
        ]);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.sisradf.deteccionFacial.index');
        $response->assertViewHas('archives', null);
    }

    /** @test  */
    public function indexHistorialFacial()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/historialFacial');
        $response->assertOk();
        $response->assertStatus(200);
        $archives = DB::table('archives_groups')->where('type', 'image')->simplePaginate(4); //Archives_groups::all()->paginate(4);
        $response->assertViewIs('pages.sisradf.deteccionFacial.indexHistory');
        $response->assertViewHas('archives', $archives);
    }

    /** @test  */
    public function indexDeteccionMovimiento()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/deteccionMovimiento');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.sisradf.deteccionMovimiento.index');
    }

    /** @test  */
    public function indexDeteccionMovimientoSearch()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/deteccionMovimiento', [
            'fecha_inicial' => '2020-01-02',
            'fecha_final' => '2020-01-02'
        ]);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.sisradf.deteccionMovimiento.index');
        $response->assertViewHas('archives', null);
    }

    /** @test  */
    public function indexHistorialMovimiento()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/historialMovimiento');
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.sisradf.deteccionMovimiento.indexHistory');
        $archives = DB::table('archives_groups')->where('type', 'video')->simplePaginate(16); //Archives_groups::all()->paginate(4);
        $response->assertViewHas('archives', $archives);
    }
}
