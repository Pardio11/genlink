<?php

namespace Database\Factories;

use App\Models\TServicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class TServicioFactory extends Factory
{
    protected $model = TServicio::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'costo' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
