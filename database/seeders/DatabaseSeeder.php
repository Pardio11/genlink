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
            RoleSeeder::class,
            ModeloAntenaSeeder::class,
            ModeloRouterSeeder::class,
            AntenasTableSeeder::class,
            RoutersTableSeeder::class,
            UserSeeder::class,
            ReportesTableSeeder::class,
            /* InstalacionesTableSeeder::class, */
            TipoDescuentosTableSeeder::class,
            TipoServiciosTableSeeder::class,
            DescuentosTableSeeder::class,
            RecargosTableSeeder::class,
            CajaTableSeeder::class,
            PagosTableSeeder::class,
            ZonasTableSeeder::class,

            // Otros seeders que desees ejecutar
        ]);
    }
}
