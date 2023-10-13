<?php

use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZonaFactory extends Factory
{
    protected $model = Zona::class;

    public function definition()
    {
        return [
            'router_id' => \App\Models\Router::factory(),
            'nombre' => $this->faker->name,
            'direccion' => $this->faker->address,
            'alcance' => $this->faker->numberBetween(1, 100),
            'antena_id' => \App\Models\Antena::factory(),
            // Otros campos de la tabla zonas
        ];
    }
}

