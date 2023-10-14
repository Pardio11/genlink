<?php

namespace Database\Factories;

use App\Models\TipoDescuento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDescuentoFactory extends Factory
{
    protected $model = TipoDescuento::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'monto' => $this->faker->randomFloat(2, 0, 1000), // Genera un valor decimal aleatorio entre 0 y 1000
        ];
    }
}

