<?php

namespace Database\Factories;

use App\Models\ModeloRouter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeloRouterFactory extends Factory
{
    protected $model = ModeloRouter::class;

    public function definition(): array
    {
        return [
            'modelo' => $this->faker->word,
            'marca' => $this->faker->word,
        ];
    }
}