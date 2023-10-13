<?php

namespace Database\Factories;

use App\Models\Descuento;
use App\Models\TipoDescuento;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescuentoFactory extends Factory
{
    protected $model = Descuento::class;

    public function definition()
    {
        return [
            'fecha_inicio' => $this->faker->dateTimeThisDecade,
            'vigencia' => $this->faker->dateTimeInInterval('now', '+1 year'),
            't_descuento_id' => TipoDescuento::factory(),
        ];
    }
}
