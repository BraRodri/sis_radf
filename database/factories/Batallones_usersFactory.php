<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Batallones_users;
use Illuminate\Database\Eloquent\Factories\Factory;

class Batallones_usersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Batallones_users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'batallon_id' => $this->faker->name(),
            'user_id' => User::factory(),
            'active' => 1
        ];
    }
}
