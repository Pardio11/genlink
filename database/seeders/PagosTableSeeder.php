<?php

namespace Database\Seeders;

use App\Models\Pago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pago::create([
            'fecha_pagado' =>'2023-7-4',
            'fecha_limite' => '2023-7-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 1,
            'tipo_servicio_id' => 2,
        ]);
        Pago::create([
            'fecha_limite' => '2023-8-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 1,
            'tipo_servicio_id' => 2,
        ]);
        Pago::create([
            'fecha_pagado' =>'2023-9-4',
            'fecha_limite' => '2023-9-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 1,
            'tipo_servicio_id' => 2,
        ]);
        Pago::create([
            'fecha_limite' => '2023-10-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 1,
            'tipo_servicio_id' => 2,
            'recargo_id'=>11
        ]);
        Pago::create([
            'fecha_pagado' => '2023-9-5',
            'fecha_limite' => '2023-9-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 2,
            'tipo_servicio_id' => 2,
        ]);
        Pago::create([
            'fecha_limite' => '2023-10-5', // Genera una fecha hasta el 31 de diciembre de 2024
            'cliente_id' => 2,
            'tipo_servicio_id' => 2,
            'recargo_id'=>11
        ]);

    }
}
