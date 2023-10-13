<?php

namespace Database\Seeders;

use App\Models\Reporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reporte::factory(10)->create();
        //
    }
}
