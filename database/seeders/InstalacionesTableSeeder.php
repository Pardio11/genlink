<?php

namespace Database\Seeders;

use App\Models\Instalacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstalacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Instalacion::factory(10)->create();
    }
}
