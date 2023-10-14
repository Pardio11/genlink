<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\Recargo;
use App\Models\Contrato;
use App\Models\TipoServicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {
        return [
            'fecha_pagado' => $this->faker->date, // Generar una fecha aleatoria
            'contrato_id' => Contrato::factory(), // Relacionar con un contrato usando su factory
            'recargo_id' => Recargo::factory(), // Relacionar con un recargo usando su factory
            'tipo_servicio_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
