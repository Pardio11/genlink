<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Instalacion;
use App\Models\Contrato;
use App\Models\Antena;
use App\Models\Cliente;
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
            
            'image_data' => null, // Puedes llenar este campo con datos de imagen si lo deseas
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Contraseña encriptada (puedes cambiar 'password' si prefieres otra)
            'remember_token' => Str::random(10),
            'cliente_id'=>Cliente::factory()
            
        ];
    }
}

