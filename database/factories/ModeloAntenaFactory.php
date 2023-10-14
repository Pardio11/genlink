<?php

namespace Database\Factories;

use App\Models\ModeloAntena;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeloAntenaFactory extends Factory
{
    protected $model = ModeloAntena::class;

    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word,
            'marca' => $this->faker->word,
        ];
    }
}