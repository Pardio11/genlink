<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\ModeloAntena;

class ModeloAntenaSeeder extends Seeder
{
    public function run()
    {
        ModeloAntena::create([
            'modelo'=>'Litebeam', 
            'marca'=>'M5 Gen-1',
           ]);
           
           ModeloAntena::create([
                'modelo'=>'Powerbeam', 
                'marca'=>'M5-400',
            ]);

    }
}

