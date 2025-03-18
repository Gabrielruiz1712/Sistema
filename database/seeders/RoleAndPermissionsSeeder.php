<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::firstOrCreate([
            'name'=>'admin',
        ]);
        $roleUser =Role::firstOrCreate([
            'name'=>'user-est'
        ]);

        Permission::firstOrCreate([
            'name'=> 'crear empleado',
        ]);

        Permission::firstOrCreate([
            'name'=> 'ver empleado',
        ]);

        Permission::firstOrCreate([
            'name'=> 'editar empleado',
        ]);

        Permission::firstOrCreate([
            'name'=> 'borrar empleado',
        ]);

        $roleAdmin->givePermissionTo('crear empleado');
        $roleAdmin->givePermissionTo('ver empleado');
        $roleAdmin->givePermissionTo('editar empleado');
        $roleAdmin->givePermissionTo('borrar empleado');

        $roleUser->givePermissionTo('ver empleado');
    }
}
