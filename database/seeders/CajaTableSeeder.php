<?php

namespace Database\Seeders;

use App\Models\Caja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Caja::create([
            'fecha' => '2023-10-17',
            'cobrador_id'=>1
        ]);
        Caja::create([
            'fecha' => '2023-11-1',
            'cobrador_id'=>1
        ]);
    }
}
