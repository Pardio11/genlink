<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModeloRouter;

class ModeloRouterSeeder extends Seeder
{
    public function run()
    {
        ModeloRouter::create([
            'modelo'=>'TP-Link', 
            'marca'=>'M5 Gen-1',
           ]);
           
           ModeloRouter::create([
            'modelo'=>'D-Link', 
            'marca'=>'DIR-2150',
        ]);
    }
}

