<?php

namespace App\Modules\Book\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
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
        //book
        $book1 = Permission::create([
            'name'          => 'index-book',
            'display_name'  => 'book  Listeleme',
            'is_active'     => 1,
        ]);

        $book2 = Permission::create([
            'name'          => 'create-book',
            'display_name'  => 'book Oluşturma',
            'is_active'     => 1,
        ]);

        $book3 = Permission::create([
            'name'          => 'edit-book',
            'display_name'  => 'book Düzenleme',
            'is_active'     => 1,
        ]);

        $book4 = Permission::create([
            'name'          => 'destroy-book',
            'display_name'  => 'book Silme',
            'is_active'     => 1,
        ]);

        $book5 = Permission::create([
            'name'          => 'show-book',
            'display_name'  => 'book Gösterme',
            'is_active'     => 1,
        ]);


        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($book1);
        $super_admin->permissions()->attach($book2);
        $super_admin->permissions()->attach($book3);
        $super_admin->permissions()->attach($book4);
        $super_admin->permissions()->attach($book5);


    }
}
