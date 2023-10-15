<?php

namespace Database\Factories;

use App\Models\Descuento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescuentoFactory extends Factory
{
    protected $model = Descuento::class;

    public function definition(): array
    {
        return [
            'mes_inicio' => $this->faker->monthName,
            'meses_vigente' => $this->faker->monthName, // Genera una fecha hasta el 31 de diciembre de 2024
            'tipo_descuento_id' => random_int(1, 2), // Genera un valor aleatorio entre 1 y 9
            'contrato_id'=>random_int(1, 2)
        ];
    }
}
