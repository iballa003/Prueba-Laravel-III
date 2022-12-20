<?php

namespace Database\Factories;

use App\Models\Piloto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PilotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Piloto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'    => $this->faker->firstName(),
            'apellidos' => $this->faker->lastname(),
            'f_nacimiento'    => $this->faker->date($format = 'd-m-Y'),
            'email'     => $this->faker->email(),
            'dni'     => $this->faker->dni(),
            'telefono'     => $this->faker->phoneNumber(),
        ];
    }
}
