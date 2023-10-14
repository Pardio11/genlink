<?php

namespace Database\Factories;

use App\Models\ModelAntena;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelAntenaFactory extends Factory
{
    protected $model = ModelAntena::class;

    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word,
            'marca' => $this->faker->word,
        ];
    }
}