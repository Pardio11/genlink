<?php

namespace Database\Seeders;

use App\Models\Descuento;
use App\Models\TipoDescuento;
use App\Models\TipoServicio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            DispositivosTableSeeder::class,
            AntenasTableSeeder::class,
            RoutersTableSeeder::class,
            ReportesTableSeeder::class,
            InstalacionesTableSeeder::class,
            TipoDescuento::class,
            TipoServicio::class,
            Descuento::class,
            RecargosTableSeeder::class,
            ContratosTableSeeder::class,
            PagosTableSeeder::class,
            ZonasTableSeeder::class,
            ClientesTableSeeder::class,

            // Otros seeders que desees ejecutar
        ]);
    }
}
