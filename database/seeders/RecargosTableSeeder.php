<?php

namespace Database\Seeders;

use App\Models\Recargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recargo::factory(10)->create(); 
        Recargo::create([
            'monto'=>50, 
            'descripcion'=>"Pago Atrasado"
        ]);
    }
}
