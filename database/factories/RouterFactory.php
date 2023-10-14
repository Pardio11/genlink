<?php

namespace Database\Factories;

use App\Models\Router;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouterFactory extends Factory
{
    protected $model = Router::class;

    public function definition()
    {
        return [
            'users' => $this->faker->userName,
            'password' => $this->faker->password,
            'ip' => $this->faker->ipv4,
            'mac' => $this->faker->macAddress,
            'dispositivo_id' => $this->faker->numberBetween(1, 10),
            // Otros campos de la tabla routers
        ];
    }
}
