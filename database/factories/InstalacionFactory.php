<?php

namespace Database\Factories;

use App\Models\Instalacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstalacionFactory extends Factory
{
    protected $model = Instalacion::class;

    public function definition(): array
    {
        return [
            'fecha_limite' => $this->faker->date(),
            'nota' => $this->faker->text,
            'realizado' => $this->faker->boolean,
        ];
    }
}
