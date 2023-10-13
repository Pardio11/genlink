<?php

namespace Database\Seeders;

use App\Models\TipoServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoServiciosTableSeeder extends Seeder
{
    public function run()
    {
        TipoServicio::factory(10)->create();
        
    }
}