<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Reporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReporteFactory extends Factory
{
    protected $model = Reporte::class;

    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date("Y-m-d"),
            'asunto' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
            'resuelto' => $this->faker->boolean(),
            'cliente_id'=> $this->faker->numberBetween(1, 10),
        ];
    }
}
