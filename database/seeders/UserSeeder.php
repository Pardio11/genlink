<?php

namespace Database\Seeders;

use App\Models\Antena;
use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Instalacion;
use App\Models\Router;
use App\Models\User;
use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $user->assignRole('Cliente');
        }
        User::create([
            'name' => 'Mauricio Lara Contreras',
            'email' => 'mau@gmail.com',
            'password' => Hash::make('123456789')


        ])->assignRole('Admin');

        $cliente = Cliente::create([
            'n_id' => 5555,
            'direccion' => "Calle Tepozan 350, Amp. Eduardo Ruiz",
            'telefono' => "4431205706",
            'instalacion_id' => Instalacion::create([
                'fecha_limite' => "2022-07-16",
                'nota' => "Es en un segundo piso, hay un arbol grande se ocuparon 3 metros de tubo",
                'realizado' => true
            ])->id,
            'contrato_id' => Contrato::create([
                'dia_corte' => 5,
                'velocidad' => 40,
                'precio' => 230,
                'activo' => true
            ])->id,
            'antena_id' => Antena::create([
                'ip' => '192.0.0.1',
                'mac' => '18:85:46:FD:3A:E7',
                'user' => 'Pardio',
                'password' => '12345678',
                'modelo_antena_id' => 1
            ])->id,
            'router_id' => Router::create([
                'ip' => '192.0.0.1',
                'mac' => '18:85:46:FD:3A:E7',
                'user' => 'Pardio',
                'password' => '12345678',
                'modelo_router_id' => 1
            ])->id,
            'zona_id' => Zona::create([
                'nombre' => "Primo Tapia",
                'direccion' => "Tepozan 350",
                'alcance' => "100km",
                'antena_id' => 1,
                'router_id' => 1,
            ])->id,
        ]);

        User::create([
            'name' => 'Carlos Alberto Pardio',
            'email' => 'pardio@gmail.com',
            'password' => Hash::make('12345678'),
            'cliente_id' => $cliente->id
        ])->assignRole('Cliente');

        $cliente = Cliente::create([
            'n_id' => 5556,
            'direccion' => "Calle Tepozan 350, Amp. Eduardo Ruiz",
            'telefono' => "4431205706",
            'instalacion_id' => Instalacion::create([
                'fecha_limite' => "2022-07-16",
                'nota' => "Es en un segundo piso, hay un arbol grande se ocuparon 3 metros de tubo",
                'realizado' => true
            ])->id,
            'contrato_id' => Contrato::create([
                'dia_corte' => 5,
                'velocidad' => 40,
                'precio' => 230,
                'activo' => false
            ])->id,
            'antena_id' => Antena::create([
                'ip' => '192.0.0.1',
                'mac' => '18:85:46:FD:3A:E7',
                'user' => 'Pardio',
                'password' => '12345678',
                'modelo_antena_id' => 1
            ])->id,
            'router_id' => Router::create([
                'ip' => '192.0.0.1',
                'mac' => '18:85:46:FD:3A:E7',
                'user' => 'Pardio',
                'password' => '12345678',
                'modelo_router_id' => 1
            ])->id,
            'zona_id' => Zona::create([
                'nombre' => "Primo Tapia",
                'direccion' => "Tepozan 350",
                'alcance' => "100km",
                'antena_id' => 1,
                'router_id' => 1,
            ])->id
        ]);

        User::create([
            'name' => 'Jesus Vazquez Villa',
            'email' => 'jesus@gmail.com',
            'password' => Hash::make('12345678'),
            'cliente_id' => $cliente->id,

        ])->assignRole('Cliente');

        User::create([
            'name' => 'Javier Tadeo Ramirez Moreno',
            'email' => 'tadeo@gmail.com',
            'password' => Hash::make('12345678')
        ])->assignRole('Admin');
    }
}
