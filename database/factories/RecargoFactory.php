<?php

namespace Database\Factories;

use App\Models\Recargo;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecargoFactory extends Factory
{
    protected $model = Recargo::class;

    public function definition(): array
    {
        return [
            'monto' => $this->faker->randomFloat(2, 1, 1000), // Genera un valor decimal aleatorio entre 1 y 1000
            'descripcion' => $this->faker->sentence,
            
        ];
    }
}
