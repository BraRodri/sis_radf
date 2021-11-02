<?php

namespace Database\Factories;

use App\Models\Archives;
use App\Models\Archives_groups;
use Illuminate\Database\Eloquent\Factories\Factory;

class Archives_groupsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Archives_groups::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'archive_id' => Archives::factory(),
            'archivo' => $this->faker->image,
            'active' => 1,
            'type' => 'image'
        ];
    }
}
