<?php

namespace Database\Factories;

use App\Models\Dispositivo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispositivoFactory extends Factory
{
    protected $model = Dispositivo::class;

    public function definition()
    {
        return [
            'modelo' => $this->faker->word,
            'marca' => $this->faker->word,
            'cantidad' => $this->faker->numberBetween(1, 10),
        ];
    }
}
