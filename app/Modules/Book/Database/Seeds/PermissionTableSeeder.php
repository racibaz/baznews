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

        $book6 = Permission::create([
            'name'          => 'update-book',
            'display_name'  => 'book update',
            'is_active'     => 1,
        ]);

        $book7 = Permission::create([
            'name'          => 'store-book',
            'display_name'  => 'book store',
            'is_active'     => 1,
        ]);


        //book_category
        $book_category1 = Permission::create([
            'name'          => 'index-bookcategory',
            'display_name'  => 'book_category  Listeleme',
            'is_active'     => 1,
        ]);

        $book_category2 = Permission::create([
            'name'          => 'create-bookcategory',
            'display_name'  => 'book_category Oluşturma',
            'is_active'     => 1,
        ]);

        $book_category3 = Permission::create([
            'name'          => 'edit-bookcategory',
            'display_name'  => 'book_category Düzenleme',
            'is_active'     => 1,
        ]);

        $book_category4 = Permission::create([
            'name'          => 'destroy-bookcategory',
            'display_name'  => 'book_category Silme',
            'is_active'     => 1,
        ]);

        $book_category5 = Permission::create([
            'name'          => 'show-bookcategory',
            'display_name'  => 'book_category Gösterme',
            'is_active'     => 1,
        ]);

        $book_category6 = Permission::create([
            'name'          => 'update-bookcategory',
            'display_name'  => 'book_category update',
            'is_active'     => 1,
        ]);

        $book_category7 = Permission::create([
            'name'          => 'store-bookcategory',
            'display_name'  => 'book_category store',
            'is_active'     => 1,
        ]);


        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($book1);
        $super_admin->permissions()->attach($book2);
        $super_admin->permissions()->attach($book3);
        $super_admin->permissions()->attach($book4);
        $super_admin->permissions()->attach($book5);
        $super_admin->permissions()->attach($book6);
        $super_admin->permissions()->attach($book7);

        $super_admin->permissions()->attach($book_category1);
        $super_admin->permissions()->attach($book_category2);
        $super_admin->permissions()->attach($book_category3);
        $super_admin->permissions()->attach($book_category4);
        $super_admin->permissions()->attach($book_category5);
        $super_admin->permissions()->attach($book_category6);
        $super_admin->permissions()->attach($book_category7);


    }
}
