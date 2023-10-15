<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Pago;
use App\Models\Contrato;
use App\Models\Recargo;
use App\Models\TipoServicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PagoFactory extends Factory
{
    protected $model = Pago::class;

    public function definition()
    {
        return [
            'fecha_pagado' => $this->faker->date, // Generar una fecha aleatoria
            'fecha_limite' => $this->faker->date('Y-m-d', '2024-12-31'), // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => Cliente::factory(),
            'tipo_servicio_id' => TipoServicio::factory(),
            'recargo_id' => Recargo::factory(),
        ];
    }
}
