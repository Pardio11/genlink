<?php

namespace Database\Factories;

use App\Models\Servicio;
use App\Models\TipoServicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    protected $model = Servicio::class;

    public function definition()
    {
        return [
            't_servicio_id' => TipoServicio::factory(),
            'fecha_Pago' => $this->faker->date,
        ];
    }
}
