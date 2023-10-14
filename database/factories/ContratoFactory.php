<?php

namespace Database\Factories;

use App\Models\Contrato;
use App\Models\Instalacion;
use App\Models\Descuento;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    protected $model = Contrato::class;

    public function definition()
    {
        return [
            'fecha_instalacion' => $this->faker->date,
            'dia_corte' => $this->faker->numberBetween(1, 28), // Día de corte entre 1 y 28
            'velocidad' => $this->faker->numberBetween(1, 100), // Velocidad entre 1 Mbps y 100 Mbps
            'precio' => $this->faker->randomFloat(2, 10, 200), // Precio aleatorio con 2 decimales entre 10 y 200
            'descuento_id' => $this->faker->numberBetween(1, 10),
            'instalacion_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
