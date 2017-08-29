<?php

namespace App\Modules\Article\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use App\Modules\Article\Models\Article;
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
            'name' => 'index-article',
            'display_name' => 'article  Listeleme',
            'is_active' => 1,
        ]);

        $article2 = Permission::create([
            'name' => 'create-article',
            'display_name' => 'article Oluşturma',
            'is_active' => 1,
        ]);

        $article3 = Permission::create([
            'name' => 'edit-article',
            'display_name' => 'article Düzenleme',
            'is_active' => 1,
        ]);

        $article4 = Permission::create([
            'name' => 'destroy-article',
            'display_name' => 'article Silme',
            'is_active' => 1,
        ]);

        $article5 = Permission::create([
            'name' => 'show-article',
            'display_name' => 'article Gösterme',
            'is_active' => 1,
        ]);

        $article6 = Permission::create([
            'name' => 'update-article',
            'display_name' => 'article update',
            'is_active' => 1,
        ]);

        $article7 = Permission::create([
            'name' => 'store-article',
            'display_name' => 'article update',
            'is_active' => 1,
        ]);

        foreach (Article::$statuses as $status) {

            $article[$status] = Permission::create([
                'name' => $status . '-article',
                'display_name' => 'Article status ' . $status,
                'is_active' => 1,
            ]);
        }

        //articleauthor
        $articleauthor1 = Permission::create([
            'name' => 'index-articleauthor',
            'display_name' => 'articleauthor  Listeleme',
            'is_active' => 1,
        ]);

        $articleauthor2 = Permission::create([
            'name' => 'create-articleauthor',
            'display_name' => 'articleauthor Oluşturma',
            'is_active' => 1,
        ]);

        $articleauthor3 = Permission::create([
            'name' => 'edit-articleauthor',
            'display_name' => 'articleauthor Düzenleme',
            'is_active' => 1,
        ]);

        $articleauthor4 = Permission::create([
            'name' => 'destroy-articleauthor',
            'display_name' => 'articleauthor Silme',
            'is_active' => 1,
        ]);

        $articleauthor5 = Permission::create([
            'name' => 'show-articleauthor',
            'display_name' => 'articleauthor Gösterme',
            'is_active' => 1,
        ]);

        $articleauthor6 = Permission::create([
            'name' => 'update-articleauthor',
            'display_name' => 'articleauthor update',
            'is_active' => 1,
        ]);

        $articleauthor7 = Permission::create([
            'name' => 'store-articleauthor',
            'display_name' => 'articleauthor store',
            'is_active' => 1,
        ]);


        //articlecategory
        $articlecategory1 = Permission::create([
            'name' => 'index-articlecategory',
            'display_name' => 'articlecategory  Listeleme',
            'is_active' => 1,
        ]);

        $articlecategory2 = Permission::create([
            'name' => 'create-articlecategory',
            'display_name' => 'articlecategory Oluşturma',
            'is_active' => 1,
        ]);

        $articlecategory3 = Permission::create([
            'name' => 'edit-articlecategory',
            'display_name' => 'articlecategory Düzenleme',
            'is_active' => 1,
        ]);

        $articlecategory4 = Permission::create([
            'name' => 'destroy-articlecategory',
            'display_name' => 'articlecategory Silme',
            'is_active' => 1,
        ]);

        $articlecategory5 = Permission::create([
            'name' => 'show-articlecategory',
            'display_name' => 'articlecategory Gösterme',
            'is_active' => 1,
        ]);

        $articlecategory6 = Permission::create([
            'name' => 'update-articlecategory',
            'display_name' => 'articlecategory update',
            'is_active' => 1,
        ]);

        $articlecategory7 = Permission::create([
            'name' => 'store-articlecategory',
            'display_name' => 'articlecategory store',
            'is_active' => 1,
        ]);

        //articlesetting
        $articlesetting1 = Permission::create([
            'name' => 'index-articlesetting',
            'display_name' => 'articlesetting  Listeleme',
            'is_active' => 1,
        ]);

        $articlesetting2 = Permission::create([
            'name' => 'create-articlesetting',
            'display_name' => 'articlesetting Oluşturma',
            'is_active' => 1,
        ]);

        $articlesetting3 = Permission::create([
            'name' => 'edit-articlesetting',
            'display_name' => 'articlesetting Düzenleme',
            'is_active' => 1,
        ]);

        $articlesetting4 = Permission::create([
            'name' => 'destroy-articlesetting',
            'display_name' => 'articlesetting Silme',
            'is_active' => 1,
        ]);

        $articlesetting5 = Permission::create([
            'name' => 'show-articlesetting',
            'display_name' => 'articlesetting Gösterme',
            'is_active' => 1,
        ]);

        $articlesetting6 = Permission::create([
            'name' => 'update-articlesetting',
            'display_name' => 'articlesetting update',
            'is_active' => 1,
        ]);

        $articlesetting7 = Permission::create([
            'name' => 'store-articlesetting',
            'display_name' => 'articlesetting store',
            'is_active' => 1,
        ]);


        //RoleTableSeeder da super_admin id sırası 5 olduğu için id si 5 olanı çekiyoruz.
        $super_admin = Role::find(5);

        $super_admin->permissions()->attach($article1);
        $super_admin->permissions()->attach($article2);
        $super_admin->permissions()->attach($article3);
        $super_admin->permissions()->attach($article4);
        $super_admin->permissions()->attach($article5);
        $super_admin->permissions()->attach($article6);
        $super_admin->permissions()->attach($article7);

        foreach (Article::$statuses as $status) {
            $super_admin->permissions()->attach($article[$status]);
        };

        $super_admin->permissions()->attach($articleauthor1);
        $super_admin->permissions()->attach($articleauthor2);
        $super_admin->permissions()->attach($articleauthor3);
        $super_admin->permissions()->attach($articleauthor4);
        $super_admin->permissions()->attach($articleauthor5);
        $super_admin->permissions()->attach($articleauthor6);
        $super_admin->permissions()->attach($articleauthor7);
        $super_admin->permissions()->attach($articlecategory1);
        $super_admin->permissions()->attach($articlecategory2);
        $super_admin->permissions()->attach($articlecategory3);
        $super_admin->permissions()->attach($articlecategory4);
        $super_admin->permissions()->attach($articlecategory5);
        $super_admin->permissions()->attach($articlecategory6);
        $super_admin->permissions()->attach($articlecategory7);
        $super_admin->permissions()->attach($articlesetting1);
        $super_admin->permissions()->attach($articlesetting2);
        $super_admin->permissions()->attach($articlesetting3);
        $super_admin->permissions()->attach($articlesetting4);
        $super_admin->permissions()->attach($articlesetting5);
        $super_admin->permissions()->attach($articlesetting6);
        $super_admin->permissions()->attach($articlesetting7);

    }
}
