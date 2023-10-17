<?php

namespace Database\Seeders;

use App\Models\TipoServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoServiciosTableSeeder extends Seeder
{
    public function run()
    {
        TipoServicio::create([
            'tipo'=>'Mano de Obra',
            'nombre'=>'Instalacion', 
            'costo'=>800,
        ]);

        TipoServicio::create([
            'tipo'=>'Plan',
            'nombre'=>'Mensualidad $230', 
            'costo'=>230,
        ]);

        TipoServicio::create([
            'tipo'=>'Plan',
            'nombre'=>'Mensualidad $250', 
            'costo'=>250,
        ]);

        TipoServicio::create([
            'tipo'=>'Plan',
            'nombre'=>'Mensualidad $300', 
            'costo'=>300,
        ]);
        
    }
}