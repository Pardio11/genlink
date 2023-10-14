<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Instalacion;
use App\Models\Contrato;
use App\Models\Antena;
use App\Models\Router;
use App\Models\Zona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'n_id' => $this->faker->unique()->randomNumber(8),
            'image_data' => null, // Puedes llenar este campo con datos de imagen si lo deseas
            'nombre' => $this->faker->name,
            'correo' => $this->faker->unique()->safeEmail,
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Contraseña encriptada (puedes cambiar 'password' si prefieres otra)
            'remember_token' => Str::random(10),
            'instalacion_id' => Instalacion::factory(),
            'contrato_id' => Contrato::factory(),
            'antena_id' => Antena::factory(),
            'router_id' => Router::factory(),
            'zona_id' => Zona::factory(),
        ];
    }
}

