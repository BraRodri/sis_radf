<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Recepcion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecepcionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recepcion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'documento_user' => 1087665443,
            'hora_entrada' => '10:50',
            'hora_salida' => '10:50',
            'motivo_ingreso' => 'tal',
            'motivo_egreso' => 'motivo',
            'imagen' => 'iamge.png',
        ];
    }
}
