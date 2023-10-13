<?php

namespace Database\Factories;

use App\Models\Pago;
use App\Models\Contrato;
use App\Models\Servicio;
use App\Models\Recargo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {
        return [
            'fecha_pagado' => $this->faker->dateTimeThisDecade,
            'contrato_id' => \Contrato::inRandomOrder()->first(),
            'servicio_id' => Servicio::inRandomOrder()->first(),
            'recargo_id' => Recargo::inRandomOrder()->first(),
        ];
    }
}
