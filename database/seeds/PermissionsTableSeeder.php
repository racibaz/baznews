<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //dashboard
        $dashboard1 = Permission::create([
            'name'          => 'index-admin',
            'display_name'  => 'Admin anasayfası',
            'is_active'     => 1,
        ]);

        $dashboard2 = Permission::create([
            'name'          => 'clear-admin',
            'display_name'  => 'Cache leri temizliyor sistemi düzenliyor.',
            'is_active'     => 1,
        ]);

        //document
        $document1 = Permission::create([
            'name'          => 'index-document',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $document2 = Permission::create([
            'name'          => 'create-document',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);


        $first_user = User::find(1);
        $second_user = User::find(2);
        $third_user = User::find(3);

        $super_admin = Role::find(1);
        $admin = Role::find(2);
        $owner = Role::find(3);
        $editor = Role::find(4);
        $member = Role::find(5);

        $super_admin->users()->attach($first_user);
//        $admin->users()->attach($first_user);

        $owner->users()->attach($second_user);
        $member->users()->attach($third_user);


        $super_admin->permissions()->attach($dashboard1);
        $super_admin->permissions()->attach($dashboard2);
        $super_admin->permissions()->attach($document1);
        $super_admin->permissions()->attach($document2);
    }
}
