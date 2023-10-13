<?php

namespace Database\Factories;

use App\Models\Instalacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstalacionFactory extends Factory
{
    protected $model = Instalacion::class;

    public function definition()
    {
        return [
            'fecha_limite' => $this->faker->date,
            'nota' => $this->faker->optional(0.5)->sentence, // Campo nota opcional con un 50% de probabilidad
            'realizado' => $this->faker->boolean(50), // Campo realizado con un 50% de probabilidad de ser verdadero
        ];
    }
}
