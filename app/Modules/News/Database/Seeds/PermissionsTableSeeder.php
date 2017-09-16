<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Modules\News\Models\News;
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
        //futurenews
        $futurenews1 = Permission::create([
            'name' => 'index-futurenews',
            'display_name' => 'futurenews  Listeleme',
            'is_active' => 1,
        ]);

        $futurenews2 = Permission::create([
            'name' => 'create-futurenews',
            'display_name' => 'futurenews Oluşturma',
            'is_active' => 1,
        ]);

        $futurenews3 = Permission::create([
            'name' => 'edit-futurenews',
            'display_name' => 'futurenews Düzenleme',
            'is_active' => 1,
        ]);

        $futurenews4 = Permission::create([
            'name' => 'destroy-futurenews',
            'display_name' => 'futurenews Silme',
            'is_active' => 1,
        ]);

        $futurenews5 = Permission::create([
            'name' => 'show-futurenews',
            'display_name' => 'futurenews Gösterme',
            'is_active' => 1,
        ]);

        $futurenews6 = Permission::create([
            'name' => 'update-futurenews',
            'display_name' => 'futurenews update',
            'is_active' => 1,
        ]);

        $futurenews7 = Permission::create([
            'name' => 'store-futurenews',
            'display_name' => 'futurenews  store',
            'is_active' => 1,
        ]);

        //newscategory
        $newscategory1 = Permission::create([
            'name' => 'index-newscategory',
            'display_name' => 'newscategory  Listeleme',
            'is_active' => 1,
        ]);

        $newscategory2 = Permission::create([
            'name' => 'create-newscategory',
            'display_name' => 'newscategory Oluşturma',
            'is_active' => 1,
        ]);

        $newscategory3 = Permission::create([
            'name' => 'edit-newscategory',
            'display_name' => 'newscategory Düzenleme',
            'is_active' => 1,
        ]);

        $newscategory4 = Permission::create([
            'name' => 'destroy-newscategory',
            'display_name' => 'newscategory Silme',
            'is_active' => 1,
        ]);

        $newscategory5 = Permission::create([
            'name' => 'show-newscategory',
            'display_name' => 'newscategory Gösterme',
            'is_active' => 1,
        ]);

        $newscategory6 = Permission::create([
            'name' => 'update-newscategory',
            'display_name' => 'newscategory update',
            'is_active' => 1,
        ]);

        $newscategory7 = Permission::create([
            'name' => 'store-newscategory',
            'display_name' => 'futurenews  store',
            'is_active' => 1,
        ]);

        //newssource
        $newssource1 = Permission::create([
            'name' => 'index-newssource',
            'display_name' => 'newssource  Listeleme',
            'is_active' => 1,
        ]);

        $newssource2 = Permission::create([
            'name' => 'create-newssource',
            'display_name' => 'newssource Oluşturma',
            'is_active' => 1,
        ]);

        $newssource3 = Permission::create([
            'name' => 'edit-newssource',
            'display_name' => 'newssource Düzenleme',
            'is_active' => 1,
        ]);

        $newssource4 = Permission::create([
            'name' => 'destroy-newssource',
            'display_name' => 'newssource Silme',
            'is_active' => 1,
        ]);

        $newssource5 = Permission::create([
            'name' => 'show-newssource',
            'display_name' => 'newssource Gösterme',
            'is_active' => 1,
        ]);

        $newssource6 = Permission::create([
            'name' => 'update-newssource',
            'display_name' => 'newssource update',
            'is_active' => 1,
        ]);

        $newssource7 = Permission::create([
            'name' => 'store-newssource',
            'display_name' => 'newssource store',
            'is_active' => 1,
        ]);

        //news
        $news1 = Permission::create([
            'name' => 'index-news',
            'display_name' => 'news  Listeleme',
            'is_active' => 1,
        ]);

        $news2 = Permission::create([
            'name' => 'create-news',
            'display_name' => 'news Oluşturma',
            'is_active' => 1,
        ]);

        $news3 = Permission::create([
            'name' => 'edit-news',
            'display_name' => 'news Düzenleme',
            'is_active' => 1,
        ]);

        $news4 = Permission::create([
            'name' => 'destroy-news',
            'display_name' => 'news Silme',
            'is_active' => 1,
        ]);

        $news5 = Permission::create([
            'name' => 'show-news',
            'display_name' => 'news Gösterme',
            'is_active' => 1,
        ]);

        $news6 = Permission::create([
            'name' => 'update-news',
            'display_name' => 'news update',
            'is_active' => 1,
        ]);

        $news7 = Permission::create([
            'name' => 'store-news',
            'display_name' => 'news store',
            'is_active' => 1,
        ]);

        $news8 = Permission::create([
            'name' => 'toggleBooleanType-news',
            'display_name' => 'news toggle_boolean_type',
            'is_active' => 1,
        ]);

        $news9 = Permission::create([
            'name' => 'statusToggle-news',
            'display_name' => 'news statusToggle ',
            'is_active' => 1,
        ]);

        $news10 = Permission::create([
            'name' => 'showTrashedRecords-news',
            'display_name' => 'news showTrashedRecords ',
            'is_active' => 1,
        ]);

        $news11 = Permission::create([
            'name' => 'trashedNewsRestore-news',
            'display_name' => 'news trashedNewsRestore',
            'is_active' => 1,
        ]);

        $news12 = Permission::create([
            'name' => 'historyForceDelete-news',
            'display_name' => 'news historyForceDelete',
            'is_active' => 1,
        ]);

        $news13 = Permission::create([
            'name' => 'newsFilter-news',
            'display_name' => 'news filter',
            'is_active' => 1,
        ]);
        
        foreach (News::$statuses as $status) {

            $news[$status] = Permission::create([
                'name' => $status . '-news',
                'display_name' => 'News status ' . $status,
                'is_active' => 1,
            ]);
        }

        //newswidgetmanager
        $newswidgetmanager1 = Permission::create([
            'name' => 'index-newswidgetmanager',
            'display_name' => 'newswidgetmanager  Listeleme',
            'is_active' => 1,
        ]);

        $newswidgetmanager2 = Permission::create([
            'name' => 'create-newswidgetmanager',
            'display_name' => 'newswidgetmanager Oluşturma',
            'is_active' => 1,
        ]);

        $newswidgetmanager3 = Permission::create([
            'name' => 'edit-newswidgetmanager',
            'display_name' => 'newswidgetmanager Düzenleme',
            'is_active' => 1,
        ]);

        $newswidgetmanager4 = Permission::create([
            'name' => 'destroy-newswidgetmanager',
            'display_name' => 'newswidgetmanager Silme',
            'is_active' => 1,
        ]);

        $newswidgetmanager5 = Permission::create([
            'name' => 'show-newswidgetmanager',
            'display_name' => 'newswidgetmanager Gösterme',
            'is_active' => 1,
        ]);

        $newswidgetmanager6 = Permission::create([
            'name' => 'update-newswidgetmanager',
            'display_name' => 'newswidgetmanager update',
            'is_active' => 1,
        ]);

        $newswidgetmanager7 = Permission::create([
            'name' => 'store-newswidgetmanager',
            'display_name' => 'newswidgetmanager store',
            'is_active' => 1,
        ]);

        //photocategory
        $photocategory1 = Permission::create([
            'name' => 'index-photocategory',
            'display_name' => 'photocategory  Listeleme',
            'is_active' => 1,
        ]);

        $photocategory2 = Permission::create([
            'name' => 'create-photocategory',
            'display_name' => 'photocategory Oluşturma',
            'is_active' => 1,
        ]);

        $photocategory3 = Permission::create([
            'name' => 'edit-photocategory',
            'display_name' => 'photocategory Düzenleme',
            'is_active' => 1,
        ]);

        $photocategory4 = Permission::create([
            'name' => 'destroy-photocategory',
            'display_name' => 'photocategory Silme',
            'is_active' => 1,
        ]);

        $photocategory5 = Permission::create([
            'name' => 'show-photocategory',
            'display_name' => 'photocategory Gösterme',
            'is_active' => 1,
        ]);

        $photocategory6 = Permission::create([
            'name' => 'update-photocategory',
            'display_name' => 'photocategory update',
            'is_active' => 1,
        ]);

        $photocategory7 = Permission::create([
            'name' => 'store-photocategory',
            'display_name' => 'photocategory store',
            'is_active' => 1,
        ]);

        //photogallery
        $photogallery1 = Permission::create([
            'name' => 'index-photogallery',
            'display_name' => 'photogallery  Listeleme',
            'is_active' => 1,
        ]);

        $photogallery2 = Permission::create([
            'name' => 'create-photogallery',
            'display_name' => 'photogallery Oluşturma',
            'is_active' => 1,
        ]);

        $photogallery3 = Permission::create([
            'name' => 'edit-photogallery',
            'display_name' => 'photogallery Düzenleme',
            'is_active' => 1,
        ]);

        $photogallery4 = Permission::create([
            'name' => 'destroy-photogallery',
            'display_name' => 'photogallery Silme',
            'is_active' => 1,
        ]);

        $photogallery5 = Permission::create([
            'name' => 'show-photogallery',
            'display_name' => 'photogallery Gösterme',
            'is_active' => 1,
        ]);

        $photogallery6 = Permission::create([
            'name' => 'update-photogallery',
            'display_name' => 'photogallery update',
            'is_active' => 1,
        ]);

        $photogallery7 = Permission::create([
            'name' => 'store-photogallery',
            'display_name' => 'photogallery store',
            'is_active' => 1,
        ]);

        $photogallery8 = Permission::create([
            'name' => 'addMultiPhotosView-photogallery',
            'display_name' => 'photogallery addMultiPhotosView',
            'is_active' => 1,
        ]);

        $photogallery9 = Permission::create([
            'name' => 'addMultiPhotos-photogallery',
            'display_name' => 'photogallery addMultiPhotos',
            'is_active' => 1,
        ]);

        $photogallery10 = Permission::create([
            'name' => 'updateGalleryPhotos-photogallery',
            'display_name' => 'photogallery updateGalleryPhotos',
            'is_active' => 1,
        ]);

        $photogallery11 = Permission::create([
            'name' => 'forgetCache-photogallery',
            'display_name' => 'photogallery forgetCache',
            'is_active' => 1,
        ]);


        //photo
        $photo1 = Permission::create([
            'name' => 'index-photo',
            'display_name' => 'photo  Listeleme',
            'is_active' => 1,
        ]);

        $photo2 = Permission::create([
            'name' => 'create-photo',
            'display_name' => 'photo Oluşturma',
            'is_active' => 1,
        ]);

        $photo3 = Permission::create([
            'name' => 'edit-photo',
            'display_name' => 'photo Düzenleme',
            'is_active' => 1,
        ]);

        $photo4 = Permission::create([
            'name' => 'destroy-photo',
            'display_name' => 'photo Silme',
            'is_active' => 1,
        ]);

        $photo5 = Permission::create([
            'name' => 'show-photo',
            'display_name' => 'photo Gösterme',
            'is_active' => 1,
        ]);

        $photo6 = Permission::create([
            'name' => 'update-photo',
            'display_name' => 'photo update',
            'is_active' => 1,
        ]);

        $photo7 = Permission::create([
            'name' => 'store-photo',
            'display_name' => 'photo store',
            'is_active' => 1,
        ]);

        //recommendationnews
        $recommendationnews1 = Permission::create([
            'name' => 'index-recommendationnews',
            'display_name' => 'recommendationnews  Listeleme',
            'is_active' => 1,
        ]);

        $recommendationnews2 = Permission::create([
            'name' => 'create-recommendationnews',
            'display_name' => 'recommendationnews Oluşturma',
            'is_active' => 1,
        ]);

        $recommendationnews3 = Permission::create([
            'name' => 'edit-recommendationnews',
            'display_name' => 'recommendationnews Düzenleme',
            'is_active' => 1,
        ]);

        $recommendationnews4 = Permission::create([
            'name' => 'destroy-recommendationnews',
            'display_name' => 'recommendationnews Silme',
            'is_active' => 1,
        ]);

        $recommendationnews5 = Permission::create([
            'name' => 'show-recommendationnews',
            'display_name' => 'recommendationnews Gösterme',
            'is_active' => 1,
        ]);

        $recommendationnews6 = Permission::create([
            'name' => 'update-recommendationnews',
            'display_name' => 'recommendationnews update',
            'is_active' => 1,
        ]);

        $recommendationnews7 = Permission::create([
            'name' => 'store-recommendationnews',
            'display_name' => 'recommendationnews store',
            'is_active' => 1,
        ]);

        //videocategory
        $videocategory1 = Permission::create([
            'name' => 'index-videocategory',
            'display_name' => 'videocategory  Listeleme',
            'is_active' => 1,
        ]);

        $videocategory2 = Permission::create([
            'name' => 'create-videocategory',
            'display_name' => 'videocategory Oluşturma',
            'is_active' => 1,
        ]);

        $videocategory3 = Permission::create([
            'name' => 'edit-videocategory',
            'display_name' => 'videocategory Düzenleme',
            'is_active' => 1,
        ]);

        $videocategory4 = Permission::create([
            'name' => 'destroy-videocategory',
            'display_name' => 'videocategory Silme',
            'is_active' => 1,
        ]);

        $videocategory5 = Permission::create([
            'name' => 'show-videocategory',
            'display_name' => 'videocategory Gösterme',
            'is_active' => 1,
        ]);

        $videocategory6 = Permission::create([
            'name' => 'update-videocategory',
            'display_name' => 'videocategory update',
            'is_active' => 1,
        ]);

        $videocategory7 = Permission::create([
            'name' => 'store-videocategory',
            'display_name' => 'videocategory store',
            'is_active' => 1,
        ]);

        //videogallery
        $videogallery1 = Permission::create([
            'name' => 'index-videogallery',
            'display_name' => 'videogallery  Listeleme',
            'is_active' => 1,
        ]);

        $videogallery2 = Permission::create([
            'name' => 'create-videogallery',
            'display_name' => 'videogallery Oluşturma',
            'is_active' => 1,
        ]);

        $videogallery3 = Permission::create([
            'name' => 'edit-videogallery',
            'display_name' => 'videogallery Düzenleme',
            'is_active' => 1,
        ]);

        $videogallery4 = Permission::create([
            'name' => 'destroy-videogallery',
            'display_name' => 'videogallery Silme',
            'is_active' => 1,
        ]);

        $videogallery5 = Permission::create([
            'name' => 'show-videogallery',
            'display_name' => 'videogallery Gösterme',
            'is_active' => 1,
        ]);

        $videogallery6 = Permission::create([
            'name' => 'update-videogallery',
            'display_name' => 'videogallery update',
            'is_active' => 1,
        ]);

        $videogallery7 = Permission::create([
            'name' => 'store-videogallery',
            'display_name' => 'videogallery store',
            'is_active' => 1,
        ]);

        $videogallery8 = Permission::create([
            'name' => 'addMultiVideosView-videogallery',
            'display_name' => 'videogallery addMultiVideosView',
            'is_active' => 1,
        ]);

        $videogallery9 = Permission::create([
            'name' => 'addMultiVideos-videogallery',
            'display_name' => 'videogallery addMultiVideos',
            'is_active' => 1,
        ]);

        $videogallery10 = Permission::create([
            'name' => 'updateGalleryVideos-videogallery',
            'display_name' => 'videogallery updateGalleryVideos',
            'is_active' => 1,
        ]);

        $videogallery11 = Permission::create([
            'name' => 'forgetCache-videogallery',
            'display_name' => 'videogallery forgetCache',
            'is_active' => 1,
        ]);


        //video
        $video1 = Permission::create([
            'name' => 'index-video',
            'display_name' => 'video  Listeleme',
            'is_active' => 1,
        ]);

        $video2 = Permission::create([
            'name' => 'create-video',
            'display_name' => 'video Oluşturma',
            'is_active' => 1,
        ]);

        $video3 = Permission::create([
            'name' => 'edit-video',
            'display_name' => 'video Düzenleme',
            'is_active' => 1,
        ]);

        $video4 = Permission::create([
            'name' => 'destroy-video',
            'display_name' => 'video Silme',
            'is_active' => 1,
        ]);

        $video5 = Permission::create([
            'name' => 'show-video',
            'display_name' => 'video Gösterme',
            'is_active' => 1,
        ]);

        $video6 = Permission::create([
            'name' => 'update-video',
            'display_name' => 'video update',
            'is_active' => 1,
        ]);

        $video7 = Permission::create([
            'name' => 'store-video',
            'display_name' => 'video store',
            'is_active' => 1,
        ]);


        //newssetting
        $newssetting1 = Permission::create([
            'name' => 'index-newssetting',
            'display_name' => 'newssetting  Listeleme',
            'is_active' => 1,
        ]);

        $newssetting2 = Permission::create([
            'name' => 'create-newssetting',
            'display_name' => 'newssetting Oluşturma',
            'is_active' => 1,
        ]);

        $newssetting3 = Permission::create([
            'name' => 'edit-newssetting',
            'display_name' => 'newssetting Düzenleme',
            'is_active' => 1,
        ]);

        $newssetting4 = Permission::create([
            'name' => 'destroy-newssetting',
            'display_name' => 'newssetting Silme',
            'is_active' => 1,
        ]);

        $newssetting5 = Permission::create([
            'name' => 'show-newssetting',
            'display_name' => 'newssetting Gösterme',
            'is_active' => 1,
        ]);

        $newssetting6 = Permission::create([
            'name' => 'update-newssetting',
            'display_name' => 'newssetting update',
            'is_active' => 1,
        ]);

        $newssetting7 = Permission::create([
            'name' => 'store-newssetting',
            'display_name' => 'newssetting  store',
            'is_active' => 1,
        ]);


        $first_user = User::find(1);
        //RoleTableSeeder da super_admin id sırası 5 olduğu için id si 5 olanı çekiyoruz.
        $super_admin = Role::find(5);

        $super_admin->permissions()->attach($futurenews1);
        $super_admin->permissions()->attach($futurenews2);
        $super_admin->permissions()->attach($futurenews3);
        $super_admin->permissions()->attach($futurenews4);
        $super_admin->permissions()->attach($futurenews5);
        $super_admin->permissions()->attach($futurenews6);
        $super_admin->permissions()->attach($futurenews7);
        $super_admin->permissions()->attach($newscategory1);
        $super_admin->permissions()->attach($newscategory2);
        $super_admin->permissions()->attach($newscategory3);
        $super_admin->permissions()->attach($newscategory4);
        $super_admin->permissions()->attach($newscategory5);
        $super_admin->permissions()->attach($newscategory6);
        $super_admin->permissions()->attach($newscategory7);
        $super_admin->permissions()->attach($newssource1);
        $super_admin->permissions()->attach($newssource2);
        $super_admin->permissions()->attach($newssource3);
        $super_admin->permissions()->attach($newssource4);
        $super_admin->permissions()->attach($newssource5);
        $super_admin->permissions()->attach($newssource6);
        $super_admin->permissions()->attach($newssource7);
        $super_admin->permissions()->attach($news1);
        $super_admin->permissions()->attach($news2);
        $super_admin->permissions()->attach($news3);
        $super_admin->permissions()->attach($news4);
        $super_admin->permissions()->attach($news5);
        $super_admin->permissions()->attach($news6);
        $super_admin->permissions()->attach($news7);
        $super_admin->permissions()->attach($news8);
        $super_admin->permissions()->attach($news9);
        $super_admin->permissions()->attach($news10);
        $super_admin->permissions()->attach($news11);
        $super_admin->permissions()->attach($news12);
        $super_admin->permissions()->attach($news13);

        foreach (News::$statuses as $status) {
            $super_admin->permissions()->attach($news[$status]);
        };

        $super_admin->permissions()->attach($newswidgetmanager1);
        $super_admin->permissions()->attach($newswidgetmanager2);
        $super_admin->permissions()->attach($newswidgetmanager3);
        $super_admin->permissions()->attach($newswidgetmanager4);
        $super_admin->permissions()->attach($newswidgetmanager5);
        $super_admin->permissions()->attach($newswidgetmanager6);
        $super_admin->permissions()->attach($newswidgetmanager7);
        $super_admin->permissions()->attach($photocategory1);
        $super_admin->permissions()->attach($photocategory2);
        $super_admin->permissions()->attach($photocategory3);
        $super_admin->permissions()->attach($photocategory4);
        $super_admin->permissions()->attach($photocategory5);
        $super_admin->permissions()->attach($photocategory6);
        $super_admin->permissions()->attach($photocategory7);
        $super_admin->permissions()->attach($photogallery1);
        $super_admin->permissions()->attach($photogallery2);
        $super_admin->permissions()->attach($photogallery3);
        $super_admin->permissions()->attach($photogallery4);
        $super_admin->permissions()->attach($photogallery5);
        $super_admin->permissions()->attach($photogallery6);
        $super_admin->permissions()->attach($photogallery7);
        $super_admin->permissions()->attach($photogallery8);
        $super_admin->permissions()->attach($photogallery9);
        $super_admin->permissions()->attach($photogallery10);
        $super_admin->permissions()->attach($photogallery11);
        $super_admin->permissions()->attach($photo1);
        $super_admin->permissions()->attach($photo2);
        $super_admin->permissions()->attach($photo3);
        $super_admin->permissions()->attach($photo4);
        $super_admin->permissions()->attach($photo5);
        $super_admin->permissions()->attach($photo6);
        $super_admin->permissions()->attach($photo7);
        $super_admin->permissions()->attach($recommendationnews1);
        $super_admin->permissions()->attach($recommendationnews2);
        $super_admin->permissions()->attach($recommendationnews3);
        $super_admin->permissions()->attach($recommendationnews4);
        $super_admin->permissions()->attach($recommendationnews5);
        $super_admin->permissions()->attach($recommendationnews6);
        $super_admin->permissions()->attach($recommendationnews7);
        $super_admin->permissions()->attach($videocategory1);
        $super_admin->permissions()->attach($videocategory2);
        $super_admin->permissions()->attach($videocategory3);
        $super_admin->permissions()->attach($videocategory4);
        $super_admin->permissions()->attach($videocategory5);
        $super_admin->permissions()->attach($videocategory6);
        $super_admin->permissions()->attach($videocategory7);
        $super_admin->permissions()->attach($videogallery1);
        $super_admin->permissions()->attach($videogallery2);
        $super_admin->permissions()->attach($videogallery3);
        $super_admin->permissions()->attach($videogallery4);
        $super_admin->permissions()->attach($videogallery5);
        $super_admin->permissions()->attach($videogallery6);
        $super_admin->permissions()->attach($videogallery7);
        $super_admin->permissions()->attach($videogallery8);
        $super_admin->permissions()->attach($videogallery9);
        $super_admin->permissions()->attach($videogallery10);
        $super_admin->permissions()->attach($videogallery11);
        $super_admin->permissions()->attach($video1);
        $super_admin->permissions()->attach($video2);
        $super_admin->permissions()->attach($video3);
        $super_admin->permissions()->attach($video4);
        $super_admin->permissions()->attach($video5);
        $super_admin->permissions()->attach($video6);
        $super_admin->permissions()->attach($video7);
        $super_admin->permissions()->attach($newssetting1);
        $super_admin->permissions()->attach($newssetting2);
        $super_admin->permissions()->attach($newssetting3);
        $super_admin->permissions()->attach($newssetting4);
        $super_admin->permissions()->attach($newssetting5);
        $super_admin->permissions()->attach($newssetting6);
        $super_admin->permissions()->attach($newssetting7);


        //RoleTableSeeder da demo_role id sırası 6 olduğu için id si 6 olanı çekiyoruz.
        $demo_role = Role::find(6);

        $demo_role->permissions()->attach($futurenews1);
        $demo_role->permissions()->attach($futurenews5);

        $demo_role->permissions()->attach($newscategory1);
        $demo_role->permissions()->attach($newscategory3);
        $demo_role->permissions()->attach($newscategory5);

        $demo_role->permissions()->attach($newssource1);
        $demo_role->permissions()->attach($newssource3);
        $demo_role->permissions()->attach($newssource5);

        $demo_role->permissions()->attach($news1);
        $demo_role->permissions()->attach($news3);
        $demo_role->permissions()->attach($news5);
        $demo_role->permissions()->attach($news10);

        foreach (News::$statuses as $status) {
            $demo_role->permissions()->attach($news[$status]);
        };

        $demo_role->permissions()->attach($newswidgetmanager1);
        $demo_role->permissions()->attach($newswidgetmanager3);
        $demo_role->permissions()->attach($newswidgetmanager5);

        $demo_role->permissions()->attach($photocategory1);
        $demo_role->permissions()->attach($photocategory3);
        $demo_role->permissions()->attach($photocategory5);

        $demo_role->permissions()->attach($photogallery1);
        $demo_role->permissions()->attach($photogallery3);
        $demo_role->permissions()->attach($photogallery5);
        $demo_role->permissions()->attach($photogallery8);
        $demo_role->permissions()->attach($photogallery9);
        $demo_role->permissions()->attach($photogallery10);
        $demo_role->permissions()->attach($photogallery11);

        $demo_role->permissions()->attach($photo1);
        $demo_role->permissions()->attach($photo3);
        $demo_role->permissions()->attach($photo5);

        $demo_role->permissions()->attach($recommendationnews1);
        $demo_role->permissions()->attach($recommendationnews3);
        $demo_role->permissions()->attach($recommendationnews5);

        $demo_role->permissions()->attach($videocategory1);
        $demo_role->permissions()->attach($videocategory3);
        $demo_role->permissions()->attach($videocategory5);

        $demo_role->permissions()->attach($videogallery1);
        $demo_role->permissions()->attach($videogallery3);
        $demo_role->permissions()->attach($videogallery5);
        $demo_role->permissions()->attach($videogallery8);
        $demo_role->permissions()->attach($videogallery9);
        $demo_role->permissions()->attach($videogallery10);
        $demo_role->permissions()->attach($videogallery11);

        $demo_role->permissions()->attach($video1);
        $demo_role->permissions()->attach($video3);
        $demo_role->permissions()->attach($video5);

        $demo_role->permissions()->attach($newssetting1);
        $demo_role->permissions()->attach($newssetting3);
        $demo_role->permissions()->attach($newssetting5);
    }
}
