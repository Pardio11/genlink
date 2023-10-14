<?php

namespace Database\Factories;

use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    protected $model = Contrato::class;

    public function definition(): array
    {
        return [
            'dia_corte' => $this->faker->numberBetween(1, 28),
            'velocidad' => $this->faker->numberBetween(1, 100),
            'precio' => $this->faker->randomFloat(2, 1, 1000), // Genera un valor decimal aleatorio entre 1 y 1000
            'activo' => $this->faker->boolean,
        ];
    }
}