<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Archives;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArchivesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Archives::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => User::factory(),
            'active' => 1
        ];
    }
}