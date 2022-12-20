<?php

namespace Database\Factories;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
class PublicacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publicacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id'    => Usuario::all()->random()->id,
            'titulo'    => $this->faker->word(),
            'publicacion'    => $this->faker->text(),
            'fecha'    => $this->faker->date($format = 'd-m-Y'),
        ];
    }
}
