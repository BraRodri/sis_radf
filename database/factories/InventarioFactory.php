<?php

namespace Database\Factories;

use App\Models\Inventario;
use App\Models\CategoriasInventario;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'categoria_inventario_id' => CategoriasInventario::factory(),
            'nombre' => $this->faker->name(),
            'stock_currently' => 20,
            'descripcion' => $this->faker->paragraph,
            'estado' => 1,
        ];
    }
}
