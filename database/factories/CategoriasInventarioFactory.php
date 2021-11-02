<?php

namespace Database\Factories;

use App\Models\CategoriasInventario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriasInventarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriasInventario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
        ];
    }
}
