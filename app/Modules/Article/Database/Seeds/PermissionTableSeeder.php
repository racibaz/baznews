<?php

namespace App\Modules\Article\Database\Seeds;

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

        //article
        $article1 = Permission::create([
            'name'          => 'index-article',
            'display_name'  => 'article  Listeleme',
            'is_active'     => 1,
        ]);

        $article2 = Permission::create([
            'name'          => 'create-article',
            'display_name'  => 'article Oluşturma',
            'is_active'     => 1,
        ]);

        $article3 = Permission::create([
            'name'          => 'edit-article',
            'display_name'  => 'article Düzenleme',
            'is_active'     => 1,
        ]);

        $article4 = Permission::create([
            'name'          => 'destroy-article',
            'display_name'  => 'article Silme',
            'is_active'     => 1,
        ]);

        $article5 = Permission::create([
            'name'          => 'show-article',
            'display_name'  => 'article Gösterme',
            'is_active'     => 1,
        ]);

        $article6 = Permission::create([
            'name'          => 'update-article',
            'display_name'  => 'article update',
            'is_active'     => 1,
        ]);

        $article7 = Permission::create([
            'name'          => 'store-article',
            'display_name'  => 'article update',
            'is_active'     => 1,
        ]);

        //author
        $author1 = Permission::create([
            'name'          => 'index-author',
            'display_name'  => 'author  Listeleme',
            'is_active'     => 1,
        ]);

        $author2 = Permission::create([
            'name'          => 'create-author',
            'display_name'  => 'author Oluşturma',
            'is_active'     => 1,
        ]);

        $author3 = Permission::create([
            'name'          => 'edit-author',
            'display_name'  => 'author Düzenleme',
            'is_active'     => 1,
        ]);

        $author4 = Permission::create([
            'name'          => 'destroy-author',
            'display_name'  => 'author Silme',
            'is_active'     => 1,
        ]);

        $author5 = Permission::create([
            'name'          => 'show-author',
            'display_name'  => 'author Gösterme',
            'is_active'     => 1,
        ]);

        $author6 = Permission::create([
            'name'          => 'update-author',
            'display_name'  => 'author update',
            'is_active'     => 1,
        ]);

        $author7 = Permission::create([
            'name'          => 'store-author',
            'display_name'  => 'author store',
            'is_active'     => 1,
        ]);

        //articlecategory
        $articlecategory1 = Permission::create([
            'name'          => 'index-articlecategory',
            'display_name'  => 'articlecategory  Listeleme',
            'is_active'     => 1,
        ]);

        $articlecategory2 = Permission::create([
            'name'          => 'create-articlecategory',
            'display_name'  => 'articlecategory Oluşturma',
            'is_active'     => 1,
        ]);

        $articlecategory3 = Permission::create([
            'name'          => 'edit-articlecategory',
            'display_name'  => 'articlecategory Düzenleme',
            'is_active'     => 1,
        ]);

        $articlecategory4 = Permission::create([
            'name'          => 'destroy-articlecategory',
            'display_name'  => 'articlecategory Silme',
            'is_active'     => 1,
        ]);

        $articlecategory5 = Permission::create([
            'name'          => 'show-articlecategory',
            'display_name'  => 'articlecategory Gösterme',
            'is_active'     => 1,
        ]);

        $articlecategory6 = Permission::create([
            'name'          => 'update-articlecategory',
            'display_name'  => 'articlecategory update',
            'is_active'     => 1,
        ]);

        $articlecategory7 = Permission::create([
            'name'          => 'store-articlecategory',
            'display_name'  => 'articlecategory store',
            'is_active'     => 1,
        ]);


        $super_admin = Role::find(1);

        $super_admin->permissions()->attach($article1);
        $super_admin->permissions()->attach($article2);
        $super_admin->permissions()->attach($article3);
        $super_admin->permissions()->attach($article4);
        $super_admin->permissions()->attach($article5);
        $super_admin->permissions()->attach($article6);
        $super_admin->permissions()->attach($article7);
        $super_admin->permissions()->attach($author1);
        $super_admin->permissions()->attach($author2);
        $super_admin->permissions()->attach($author3);
        $super_admin->permissions()->attach($author4);
        $super_admin->permissions()->attach($author5);
        $super_admin->permissions()->attach($author6);
        $super_admin->permissions()->attach($author7);
        $super_admin->permissions()->attach($articlecategory1);
        $super_admin->permissions()->attach($articlecategory2);
        $super_admin->permissions()->attach($articlecategory3);
        $super_admin->permissions()->attach($articlecategory4);
        $super_admin->permissions()->attach($articlecategory5);
        $super_admin->permissions()->attach($articlecategory6);
        $super_admin->permissions()->attach($articlecategory7);

    }
}
