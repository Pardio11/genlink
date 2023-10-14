<?php

namespace Database\Seeders;

use App\Models\Antena;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntenasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
     Antena::factory(10)->create(); // Esto generará 10 registros de antenas

    }
}
