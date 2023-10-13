<?php

namespace Database\Factories;

use App\Models\TipoDescuento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoDescuentoFactory extends Factory
{
    protected $model = TipoDescuento::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'monto' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
