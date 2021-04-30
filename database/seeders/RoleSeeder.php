<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'admin']);
        $roleAgencia = Role::create(['name'=>'agencia']);
        $roleEntrenador = Role::create(['name'=>'entrenador']);
        $roleJugador = Role::create(['name'=>'jugador']);

        Permission::create(['name'=>'dashboard.index'])
                    ->syncRoles([$roleAdmin, $roleAgencia]);
        Permission::create(['name'=>'dashboard.create'])
                    ->syncRoles([$roleAdmin,$roleAgencia, $roleEntrenador, $roleJugador ]);
        Permission::create(['name'=>'dashboard.edit'])
                    ->syncRoles([$roleAdmin,$roleAgencia, $roleEntrenador, $roleJugador ]);;
        Permission::create(['name'=>'dashboard.destroy'])
                    ->syncRoles([$roleAdmin,$roleAgencia, $roleEntrenador, $roleJugador ]);;
    }
}
