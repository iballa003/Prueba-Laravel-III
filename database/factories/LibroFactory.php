<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Libro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'    => $this->faker->word(),
            'autor'    => $this->faker->name(),
            'paginas'    => $this->faker->randomDigit(),
            'genero'    => $this->faker->word(),
            'f_publicacion'    => $this->faker->date($format = 'd-m-Y')
        ];
    }
}
