<?php

namespace Database\Factories;

use App\Models\Receta;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'    => $this->faker->word(),
            'descripcion'    => $this->faker->text($maxNbChars = 50),
            'price'    => $this->faker->randomNumber(2),
            'calorias'    => $this->faker->randomNumber(2),
            'f_alta'    => $this->faker->date($format = 'd-m-Y')
        ];
    }
}
