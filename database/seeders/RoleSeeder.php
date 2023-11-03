<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Cliente']);
        $role3 = Role::create(['name'=>'Cobrador']);

        
        Permission::create(['name'=>'cliente'])->assignRole($role2);
        Permission::create(['name'=>'mis-pagos'])->assignRole($role2);
        Permission::create(['name'=>'preguntas-frecuentes'])->assignRole($role2);
        Permission::create(['name'=>'reportes'])->assignRole($role2);

        
        Permission::create(['name'=>'admin'])->assignRole($role1);
        Permission::create(['name'=>'clientes'])->assignRole($role1);
        Permission::create(['name'=>'estado-cuenta'])->assignRole($role1);
        Permission::create(['name'=>'pagos-atrasados'])->assignRole($role1);
        Permission::create(['name'=>'cancelados'])->assignRole($role1);
        Permission::create(['name'=>'pendientes'])->assignRole($role1);
        Permission::create(['name'=>'reportes-admin'])->assignRole($role1);
        
        Permission::create(['name'=>'cobrador'])->assignRole($role3);
        Permission::create(['name'=>'realizar-pago'])->assignRole($role3);
        Permission::create(['name'=>'busqueda-cliente'])->assignRole($role3);


        
    }
}
