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
        TipoDescuento::factory(10)->create();
        //

    }
}
