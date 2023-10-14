<?php

namespace Database\Factories;


use App\Models\TipoServicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoServicioFactory extends Factory
{
    protected $model = TipoServicio::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'costo' => $this->faker->randomFloat(2, 1, 1000), // Genera un valor decimal aleatorio entre 1 y 1000
        ];
    }
}
