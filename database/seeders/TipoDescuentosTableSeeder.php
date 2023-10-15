<?php

namespace Database\Seeders;

use App\Models\TipoDescuento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDescuentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TipoDescuento::create([
            'nombre'=>'Apertura', 
            'monto'=>30,
           ]);
           
        TipoDescuento::create([
        'nombre'=>'Mes Gratis', 
        'monto'=>230,
        ]);

    }
}
