<?php

namespace Database\Factories;

use App\Models\Inventario;
use App\Models\HistorialInventario;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistorialInventarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HistorialInventario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'inventario_id' => Inventario::factory(),
            'cantidad_agregada' => 50,
            'cantidad_eliminada' => 10,
            'stock_registrado' => 20,
        ];
    }
}
