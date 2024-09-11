<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles
        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'cliente']);
        //Permisos
        Permission::create(['name'=>'inquilino.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'inquilino.destroy'])->assignRole('admin');
        Permission::create(['name'=>'inquilino.create'])->assignRole('admin');
        Permission::create(['name'=>'inquilino.edit'])->assignRole('admin');
        Permission::create(['name'=>'users.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'users.destroy'])->assignRole('admin');
        Permission::create(['name'=>'users.edit'])->assignRole('admin');
    }
}
