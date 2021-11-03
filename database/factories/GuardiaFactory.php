<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Guardia;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuardiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guardia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'descripcion' => $this->faker->paragraph,
            'fecha_inicio' => $this->faker->date,
            'fecha_fin' => $this->faker->date
        ];
    }
}
