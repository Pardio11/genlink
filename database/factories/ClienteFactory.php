<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'n_id' => $this->faker->unique()->numerify('########'), // Generar un número único de 8 dígitos
            'image_data' => null, // Puedes ajustar la generación de imágenes si es necesario
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'correo' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Ajusta la contraseña predeterminada si es necesario
            'pago_id' => $this->faker->numberBetween(1, 10),
            'contrato_id' => $this->faker->numberBetween(1, 10),
            'antena_id' => $this->faker->numberBetween(1, 10),
            'router_id' => $this->faker->numberBetween(1, 10),
            'zona_id' => $this->faker->numberBetween(1, 10),
            'reporte_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
