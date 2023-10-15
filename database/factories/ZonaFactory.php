<?php
namespace Database\Factories;
use App\Models\Zona;
use App\Models\Router;
use App\Models\Antena;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZonaFactory extends Factory
{
    protected $model = Zona::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'direccion' => $this->faker->address,
            'alcance' => $this->faker->numberBetween(1, 100),
            'router_id' => Router::factory(),
            'antena_id' => Antena::factory(),
        ];
    }
}
