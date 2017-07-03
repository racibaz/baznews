<?php

namespace App\Modules\Book\Database\Seeds;

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
        //book
        $book1 = Permission::create([
            'name' => 'index-book',
            'display_name' => 'book  Listeleme',
            'is_active' => 1,
        ]);

        $book2 = Permission::create([
            'name' => 'create-book',
            'display_name' => 'book Oluşturma',
            'is_active' => 1,
        ]);

        $book3 = Permission::create([
            'name' => 'edit-book',
            'display_name' => 'book Düzenleme',
            'is_active' => 1,
        ]);

        $book4 = Permission::create([
            'name' => 'destroy-book',
            'display_name' => 'book Silme',
            'is_active' => 1,
        ]);

        $book5 = Permission::create([
            'name' => 'show-book',
            'display_name' => 'book Gösterme',
            'is_active' => 1,
        ]);

        $book6 = Permission::create([
            'name' => 'update-book',
            'display_name' => 'book update',
            'is_active' => 1,
        ]);

        $book7 = Permission::create([
            'name' => 'store-book',
            'display_name' => 'book store',
            'is_active' => 1,
        ]);


        //book_category
        $book_category1 = Permission::create([
            'name' => 'index-bookcategory',
            'display_name' => 'book_category  Listeleme',
            'is_active' => 1,
        ]);

        $book_category2 = Permission::create([
            'name' => 'create-bookcategory',
            'display_name' => 'book_category Oluşturma',
            'is_active' => 1,
        ]);

        $book_category3 = Permission::create([
            'name' => 'edit-bookcategory',
            'display_name' => 'book_category Düzenleme',
            'is_active' => 1,
        ]);

        $book_category4 = Permission::create([
            'name' => 'destroy-bookcategory',
            'display_name' => 'book_category Silme',
            'is_active' => 1,
        ]);

        $book_category5 = Permission::create([
            'name' => 'show-bookcategory',
            'display_name' => 'book_category Gösterme',
            'is_active' => 1,
        ]);

        $book_category6 = Permission::create([
            'name' => 'update-bookcategory',
            'display_name' => 'book_category update',
            'is_active' => 1,
        ]);

        $book_category7 = Permission::create([
            'name' => 'store-bookcategory',
            'display_name' => 'book_category store',
            'is_active' => 1,
        ]);

        //bookpublisher
        $bookpublisher1 = Permission::create([
            'name' => 'index-bookpublisher',
            'display_name' => 'bookpublisher  Listeleme',
            'is_active' => 1,
        ]);

        $bookpublisher2 = Permission::create([
            'name' => 'create-bookpublisher',
            'display_name' => 'bookpublisher Oluşturma',
            'is_active' => 1,
        ]);

        $bookpublisher3 = Permission::create([
            'name' => 'edit-bookpublisher',
            'display_name' => 'bookpublisher Düzenleme',
            'is_active' => 1,
        ]);

        $bookpublisher4 = Permission::create([
            'name' => 'destroy-bookpublisher',
            'display_name' => 'bookpublisher Silme',
            'is_active' => 1,
        ]);

        $bookpublisher5 = Permission::create([
            'name' => 'show-bookpublisher',
            'display_name' => 'bookpublisher Gösterme',
            'is_active' => 1,
        ]);

        $bookpublisher6 = Permission::create([
            'name' => 'update-bookpublisher',
            'display_name' => 'bookpublisher update',
            'is_active' => 1,
        ]);

        $bookpublisher7 = Permission::create([
            'name' => 'store-bookpublisher',
            'display_name' => 'bookpublisher store',
            'is_active' => 1,
        ]);


        //bookauthor
        $bookauthor1 = Permission::create([
            'name' => 'index-bookauthor',
            'display_name' => 'bookauthor  Listeleme',
            'is_active' => 1,
        ]);

        $bookauthor2 = Permission::create([
            'name' => 'create-bookauthor',
            'display_name' => 'bookauthor Oluşturma',
            'is_active' => 1,
        ]);

        $bookauthor3 = Permission::create([
            'name' => 'edit-bookauthor',
            'display_name' => 'bookauthor Düzenleme',
            'is_active' => 1,
        ]);

        $bookauthor4 = Permission::create([
            'name' => 'destroy-bookauthor',
            'display_name' => 'bookauthor Silme',
            'is_active' => 1,
        ]);

        $bookauthor5 = Permission::create([
            'name' => 'show-bookauthor',
            'display_name' => 'bookauthor Gösterme',
            'is_active' => 1,
        ]);

        $bookauthor6 = Permission::create([
            'name' => 'update-bookauthor',
            'display_name' => 'bookauthor update',
            'is_active' => 1,
        ]);

        $bookauthor7 = Permission::create([
            'name' => 'store-bookauthor',
            'display_name' => 'bookauthor store',
            'is_active' => 1,
        ]);

        //booksetting
        $booksetting1 = Permission::create([
            'name' => 'index-booksetting',
            'display_name' => 'booksetting  Listeleme',
            'is_active' => 1,
        ]);

        $booksetting2 = Permission::create([
            'name' => 'create-booksetting',
            'display_name' => 'booksetting Oluşturma',
            'is_active' => 1,
        ]);

        $booksetting3 = Permission::create([
            'name' => 'edit-booksetting',
            'display_name' => 'booksetting Düzenleme',
            'is_active' => 1,
        ]);

        $booksetting4 = Permission::create([
            'name' => 'destroy-booksetting',
            'display_name' => 'booksetting Silme',
            'is_active' => 1,
        ]);

        $booksetting5 = Permission::create([
            'name' => 'show-booksetting',
            'display_name' => 'booksetting Gösterme',
            'is_active' => 1,
        ]);

        $booksetting6 = Permission::create([
            'name' => 'update-booksetting',
            'display_name' => 'booksetting update',
            'is_active' => 1,
        ]);

        $booksetting7 = Permission::create([
            'name' => 'store-booksetting',
            'display_name' => 'booksetting store',
            'is_active' => 1,
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

        $super_admin->permissions()->attach($bookpublisher1);
        $super_admin->permissions()->attach($bookpublisher2);
        $super_admin->permissions()->attach($bookpublisher3);
        $super_admin->permissions()->attach($bookpublisher4);
        $super_admin->permissions()->attach($bookpublisher5);
        $super_admin->permissions()->attach($bookpublisher6);
        $super_admin->permissions()->attach($bookpublisher7);

        $super_admin->permissions()->attach($bookauthor1);
        $super_admin->permissions()->attach($bookauthor2);
        $super_admin->permissions()->attach($bookauthor3);
        $super_admin->permissions()->attach($bookauthor4);
        $super_admin->permissions()->attach($bookauthor5);
        $super_admin->permissions()->attach($bookauthor6);
        $super_admin->permissions()->attach($bookauthor7);

        $super_admin->permissions()->attach($booksetting1);
        $super_admin->permissions()->attach($booksetting2);
        $super_admin->permissions()->attach($booksetting3);
        $super_admin->permissions()->attach($booksetting4);
        $super_admin->permissions()->attach($booksetting5);
        $super_admin->permissions()->attach($booksetting6);
        $super_admin->permissions()->attach($booksetting7);

    }
}
