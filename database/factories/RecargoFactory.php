<?php

namespace Database\Factories;

use App\Models\Recargo;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecargoFactory extends Factory
{
    protected $model = Recargo::class;

    public function definition()
    {
        return [
            'monto' => $this->faker->randomFloat(2, 1, 1000), // Genera un monto decimal aleatorio
            'descripcion' => $this->faker->sentence,
        ];
    }
}
