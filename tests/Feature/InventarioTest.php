<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Inventario;
use App\Models\HistorialInventario;
use App\Models\CategoriasInventario;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InventarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function indexAlmacen()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 1
        ]);
        $productos = Inventario::where('categoria_inventario_id', 1)->get();
        $response = $this->get('/inventario/almacen');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.inventario.indexAlmacen');
        $response->assertViewHas('productos', $productos);
    }

    /** @test  */
    public function indexArmamento()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 2
        ]);
        $productos = Inventario::where('categoria_inventario_id', 2)->get();
        $response = $this->get('/inventario/armamento');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.inventario.indexArmamento');
        $response->assertViewHas('productos', $productos);
    }

    /** @test  */
    public function indexAlimentos()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 3
        ]);
        $productos = Inventario::where('categoria_inventario_id', 3)->get();
        $response = $this->get('/inventario/alimentos');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.inventario.indexAlimentos');
        $response->assertViewHas('productos', $productos);
    }

    /** @test  */
    public function indexInsumos()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 4
        ]);
        $productos = Inventario::where('categoria_inventario_id', 4)->get();
        $response = $this->get('/inventario/insumos');
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.inventario.indexInsumos');
        $response->assertViewHas('productos', $productos);
    }

    /** @test  */
    public function storeInventario()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();

        $response = $this->post('/inventario', [
            'categoria_inventario_id' => 2,
            'nombre' => 'Titulo inventario',
            'stock' => 50,
            'descripcion' => 'Descripción example',
            'route_name' => 'inventarioAlmacen.index'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/inventario/almacen');
        $response->assertSessionHasAll(['error' => 'success']);
    }

    /** @test  */
    public function editInventario()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 4
        ]);
        $response = $this->get('/inventario/edit/' . 1);
        $response->assertStatus(200);
        $response->assertOk();
        $response->assertViewIs('pages.inventario.edit');
        $inventario = Inventario::find(1);
        $response->assertViewHas('inventario', $inventario);
    }

    /** @test  */
    public function updateInventario()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 4
        ]);
        $response = $this->post('/inventario/update/' . 1, [
            'nombre' => 'Nombre editado',
            'stock' => 50,
            'descripcion' => 'Descripcion',
            'route_name' => 'inventarioAlmacen.index'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/inventario/almacen');
        $response->assertSessionHasAll(['error' => 'success_updated']);
    }

    /** @test  */
    public function destroyInventario()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 4
        ]);
        $response = $this->post('/inventario/delete', [
            'idUser' => 1,
            'route_name' => 'inventarioAlmacen.index'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/inventario/almacen');
        $response->assertSessionHasAll(['error' => 'delete']);
    }

    /** @test  */
    public function indexHistory()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)->create([
            'categoria_inventario_id' => 4
        ]);
        $response = $this->get('/inventario/history/' . 1, [
            'idUser' => 1,
            'route_name' => 'inventarioAlmacen.index'
        ]);
        $response->assertOk();
        $response->assertStatus(200);
        $response->assertViewIs('pages.inventario.history.index');
        $inventario = Inventario::find(1);
        $response->assertViewHas(['inventario' => $inventario]);
    }

    /** @test  */
    public function storeHistory()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        CategoriasInventario::factory(4)->create();
        Inventario::factory(2)
        ->create([
            'categoria_inventario_id' => 4
        ]);
        HistorialInventario::factory(2)->create([
            'inventario_id' => 1
        ]);
        $response = $this->post('/inventario/history/' . 1, [
            'cantidad_agregada' => 2,
            'cantidad_eliminada' => 4
        ]);
        $response->assertStatus(302);
        //$response->assertViewIs('pages.inventario.history.index');
        $response->assertRedirect('/inventario/history/1');
        $response->assertSessionHasAll(['error' => 'success']);
    }
}
