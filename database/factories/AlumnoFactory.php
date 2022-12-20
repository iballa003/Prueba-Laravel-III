<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'    => $this->faker->name(),
            'apellidos' => $this->faker->lastname(),
            'email'     => $this->faker->email(),
            'f_nacimiento'    => $this->faker->date($format = 'd-m-Y'),
            'c_postal'    => $this->faker->postcode()
        ];
    }
}
