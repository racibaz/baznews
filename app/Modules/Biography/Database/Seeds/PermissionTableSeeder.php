<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //biography
        $biography1 = Permission::create([
            'name'          => 'index-biography',
            'display_name'  => 'biography  Listeleme',
            'is_active'     => 1,
        ]);

        $biography2 = Permission::create([
            'name'          => 'create-biography',
            'display_name'  => 'biography Oluşturma',
            'is_active'     => 1,
        ]);

        $biography3 = Permission::create([
            'name'          => 'edit-biography',
            'display_name'  => 'biography Düzenleme',
            'is_active'     => 1,
        ]);

        $biography4 = Permission::create([
            'name'          => 'destroy-biography',
            'display_name'  => 'biography Silme',
            'is_active'     => 1,
        ]);

        $biography5 = Permission::create([
            'name'          => 'show-biography',
            'display_name'  => 'biography Gösterme',
            'is_active'     => 1,
        ]);


        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($biography1);
        $super_admin->permissions()->attach($biography2);
        $super_admin->permissions()->attach($biography3);
        $super_admin->permissions()->attach($biography4);
        $super_admin->permissions()->attach($biography5);
    }
}
