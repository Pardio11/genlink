<?php
namespace Database\Factories;

use App\Models\Antena;
use Illuminate\Database\Eloquent\Factories\Factory;

class AntenaFactory extends Factory
{
    protected $model = Antena::class;

    public function definition(): array
    {
        return [
            'ip' => $this->faker->ipv4,
            'mac' => $this->faker->macAddress,
            'user' => $this->faker->userName,
            'password' => $this->faker->password,
            'modelo_antena_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
