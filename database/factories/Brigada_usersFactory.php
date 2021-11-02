<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Brigada_users;
use Illuminate\Database\Eloquent\Factories\Factory;

class Brigada_usersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brigada_users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brigada_id'=> $this->faker->name(),
            'user_id' => User::factory(),
            'active' => 1
        ];
    }
}
