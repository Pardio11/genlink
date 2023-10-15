<?php
namespace Database\Factories;

use App\Models\Router;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouterFactory extends Factory
{
    protected $model = Router::class;

    public function definition(): array
    {
        return [
            'users' => $this->faker->userName,
            'password' => $this->faker->password,
            'ip' => $this->faker->ipv4,
            'mac' => $this->faker->macAddress,
            'modelo_router_id' =>  $this->faker->numberBetween(1, 2), // Genera un valor aleatorio entre 1 y 9
        ];
    }
}