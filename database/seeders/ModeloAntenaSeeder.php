<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModeloAntena;

class ModeloAntenaSeeder extends Seeder
{
    public function run()
    {
        ModeloAntena::factory(10)->create();

    }
}

