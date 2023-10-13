<?php

namespace Database\Factories;

use App\Models\Antena;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Antena>
 */
class AntenaFactory extends Factory
{
    protected $model = Antena::class;

    public function definition()
    {
        return [
            'ip' => $this->faker->ipv4,
            'mac' => $this->faker->macAddress,
            'user' => $this->faker->userName,
            'password' => bcrypt('password'), // Cambia 'password' por la contraseña que desees
            'dispositivo_id' => 1, // ID de un dispositivo relacionado
        ];
    }
}
