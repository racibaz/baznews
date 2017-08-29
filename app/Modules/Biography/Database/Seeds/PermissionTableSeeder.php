<?php

namespace App\Modules\Biography\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use App\Modules\Biography\Models\Biography;
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
            'name' => 'index-biography',
            'display_name' => 'biography  Listeleme',
            'is_active' => 1,
        ]);

        $biography2 = Permission::create([
            'name' => 'create-biography',
            'display_name' => 'biography Oluşturma',
            'is_active' => 1,
        ]);

        $biography3 = Permission::create([
            'name' => 'edit-biography',
            'display_name' => 'biography Düzenleme',
            'is_active' => 1,
        ]);

        $biography4 = Permission::create([
            'name' => 'destroy-biography',
            'display_name' => 'biography Silme',
            'is_active' => 1,
        ]);

        $biography5 = Permission::create([
            'name' => 'show-biography',
            'display_name' => 'biography Gösterme',
            'is_active' => 1,
        ]);

        $biography6 = Permission::create([
            'name' => 'update-biography',
            'display_name' => 'update biography',
            'is_active' => 1,
        ]);

        $biography7 = Permission::create([
            'name' => 'store-biography',
            'display_name' => 'update store',
            'is_active' => 1,
        ]);

        foreach (Biography::$statuses as $status) {

            $biography[$status] = Permission::create([
                'name' => $status . '-biography',
                'display_name' => 'Biography status ' . $status,
                'is_active' => 1,
            ]);
        }

        //biographysetting
        $biographysetting1 = Permission::create([
            'name' => 'index-biographysetting',
            'display_name' => 'biographysetting  Listeleme',
            'is_active' => 1,
        ]);

        $biographysetting2 = Permission::create([
            'name' => 'create-biographysetting',
            'display_name' => 'biographysetting Oluşturma',
            'is_active' => 1,
        ]);

        $biographysetting3 = Permission::create([
            'name' => 'edit-biographysetting',
            'display_name' => 'biographysetting Düzenleme',
            'is_active' => 1,
        ]);

        $biographysetting4 = Permission::create([
            'name' => 'destroy-biographysetting',
            'display_name' => 'biographysetting Silme',
            'is_active' => 1,
        ]);

        $biographysetting5 = Permission::create([
            'name' => 'show-biographysetting',
            'display_name' => 'biographysetting Gösterme',
            'is_active' => 1,
        ]);

        $biographysetting6 = Permission::create([
            'name' => 'update-biographysetting',
            'display_name' => 'update biographysetting',
            'is_active' => 1,
        ]);

        $biographysetting7 = Permission::create([
            'name' => 'store-biographysetting',
            'display_name' => 'update store',
            'is_active' => 1,
        ]);

        //RoleTableSeeder da super_admin id sırası 5 olduğu için id si 5 olanı çekiyoruz.
        $super_admin = Role::find(5);

        $super_admin->permissions()->attach($biography1);
        $super_admin->permissions()->attach($biography2);
        $super_admin->permissions()->attach($biography3);
        $super_admin->permissions()->attach($biography4);
        $super_admin->permissions()->attach($biography5);
        $super_admin->permissions()->attach($biography6);
        $super_admin->permissions()->attach($biography7);

        foreach (Biography::$statuses as $status) {
            $super_admin->permissions()->attach($biography[$status]);
        };


        $super_admin->permissions()->attach($biographysetting1);
        $super_admin->permissions()->attach($biographysetting2);
        $super_admin->permissions()->attach($biographysetting3);
        $super_admin->permissions()->attach($biographysetting4);
        $super_admin->permissions()->attach($biographysetting5);
        $super_admin->permissions()->attach($biographysetting6);
        $super_admin->permissions()->attach($biographysetting7);
    }
}
