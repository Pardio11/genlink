<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModeloRouter;

class ModeloRouterSeeder extends Seeder
{
    public function run()
    {
        ModeloRouter::factory(10)->create();

    }
}

