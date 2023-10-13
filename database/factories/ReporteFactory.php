<?php

namespace Database\Factories;

use App\Models\Reporte;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReporteFactory extends Factory
{
    protected $model = Reporte::class;

    public function definition()
    {
        return [
            'asunto' => $this->faker->sentence,
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
