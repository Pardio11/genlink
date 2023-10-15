<?php

namespace Database\Factories;

use App\Models\Antena;
use App\Models\Contrato;
use App\Models\Instalacion;
use App\Models\Router;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'n_id' => $this->faker->unique()->randomNumber(8),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'instalacion_id' => Instalacion::factory(),
            'contrato_id' => Contrato::factory(),
            'antena_id' => Antena::factory(),
            'router_id' => Router::factory(),
            'zona_id' => Zona::factory(),
        ];
    }
}
