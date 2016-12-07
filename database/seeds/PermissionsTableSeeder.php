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

        $document3 = Permission::create([
            'name'          => 'edit-document',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $document4 = Permission::create([
            'name'          => 'destroy-document',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $document5 = Permission::create([
            'name'          => 'show-document',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //announcement
        $announcement1 = Permission::create([
            'name'          => 'index-announcement',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $announcement2 = Permission::create([
            'name'          => 'create-announcement',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $announcement3 = Permission::create([
            'name'          => 'edit-announcement',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $announcement4 = Permission::create([
            'name'          => 'destroy-announcement',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $announcement5 = Permission::create([
            'name'          => 'show-announcement',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //contactType
        $contactType1 = Permission::create([
            'name'          => 'index-contactType',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $contactType2 = Permission::create([
            'name'          => 'create-contactType',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $contactType3 = Permission::create([
            'name'          => 'edit-contactType',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $contactType4 = Permission::create([
            'name'          => 'destroy-contactType',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $contactType5 = Permission::create([
            'name'          => 'show-contactType',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //menu
        $menu1 = Permission::create([
            'name'          => 'index-menu',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $menu2 = Permission::create([
            'name'          => 'create-menu',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $menu3 = Permission::create([
            'name'          => 'edit-menu',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $menu4 = Permission::create([
            'name'          => 'destroy-menu',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $menu5 = Permission::create([
            'name'          => 'show-menu',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //page
        $page1 = Permission::create([
            'name'          => 'index-page',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $page2 = Permission::create([
            'name'          => 'create-page',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $page3 = Permission::create([
            'name'          => 'edit-page',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $page4 = Permission::create([
            'name'          => 'destroy-page',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $page5 = Permission::create([
            'name'          => 'show-page',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //rss
        $rss1 = Permission::create([
            'name'          => 'index-rss',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $rss2 = Permission::create([
            'name'          => 'create-rss',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $rss3 = Permission::create([
            'name'          => 'edit-rss',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $rss4 = Permission::create([
            'name'          => 'destroy-rss',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $rss5 = Permission::create([
            'name'          => 'show-rss',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //sitemaps
        $sitemaps1 = Permission::create([
            'name'          => 'index-sitemaps',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $sitemaps2 = Permission::create([
            'name'          => 'create-sitemaps',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $sitemaps3 = Permission::create([
            'name'          => 'edit-sitemaps',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $sitemaps4 = Permission::create([
            'name'          => 'destroy-sitemaps',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $sitemaps5 = Permission::create([
            'name'          => 'show-sitemaps',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //user
        $user1 = Permission::create([
            'name'          => 'index-user',
            'display_name'  => 'Kullanıcı Listeleme',
            'is_active'     => 1,
        ]);

        $user2 = Permission::create([
            'name'          => 'create-user',
            'display_name'  => 'Kullanıcı Oluşturma',
            'is_active'     => 1,
        ]);

        $user3 = Permission::create([
            'name'          => 'edit-user',
            'display_name'  => 'Kullanıcı Düzenleme',
            'is_active'     => 1,
        ]);

        $user4 = Permission::create([
            'name'          => 'destroy-user',
            'display_name'  => 'Kullanıcı Silme',
            'is_active'     => 1,
        ]);

        $user5 = Permission::create([
            'name'          => 'show-user',
            'display_name'  => 'Kullanıcı Gösterme',
            'is_active'     => 1,
        ]);

        $user6 = Permission::create([
            'name'          => 'user_operation-user',
            'display_name'  => 'Kullanıcı İşlemleri',
            'is_active'     => 1,
        ]);

        $user7 = Permission::create([
            'name'          => 'update_other_user-user',
            'display_name'  => 'Kullanıcı başka bir kullanıcıyı güncelleme yetkisi',
            'is_active'     => 1,
        ]);

        $user8 = Permission::create([
            'name'          => 'show_other_user-user',
            'display_name'  => 'Kullanıcı başka bir kullanıcıyı detaylarını görme yetkisi',
            'is_active'     => 1,
        ]);

        //Group
        $group1 = Permission::create([
            'name'          => 'index-group',
            'display_name'  => 'Group  Listeleme',
            'is_active'     => 1,
        ]);

        $group2 = Permission::create([
            'name'          => 'create-group',
            'display_name'  => 'Group Oluşturma',
            'is_active'     => 1,
        ]);

        $group3 = Permission::create([
            'name'          => 'edit-group',
            'display_name'  => 'Group Düzenleme',
            'is_active'     => 1,
        ]);

        $group4 = Permission::create([
            'name'          => 'destroy-group',
            'display_name'  => 'Group Silme',
            'is_active'     => 1,
        ]);

        $group5 = Permission::create([
            'name'          => 'show-group',
            'display_name'  => 'Group Gösterme',
            'is_active'     => 1,
        ]);

        //role
        $role1 = Permission::create([
            'name'          => 'index-role',
            'display_name'  => 'role  Listeleme',
            'is_active'     => 1,
        ]);

        $role2 = Permission::create([
            'name'          => 'create-role',
            'display_name'  => 'role Oluşturma',
            'is_active'     => 1,
        ]);

        $role3 = Permission::create([
            'name'          => 'edit-role',
            'display_name'  => 'role Düzenleme',
            'is_active'     => 1,
        ]);

        $role4 = Permission::create([
            'name'          => 'destroy-role',
            'display_name'  => 'role Silme',
            'is_active'     => 1,
        ]);

        $role5 = Permission::create([
            'name'          => 'show-role',
            'display_name'  => 'role Gösterme',
            'is_active'     => 1,
        ]);

        //tag
        $tag1 = Permission::create([
            'name'          => 'index-tag',
            'display_name'  => 'tag  Listeleme',
            'is_active'     => 1,
        ]);

        $tag2 = Permission::create([
            'name'          => 'create-tag',
            'display_name'  => 'tag Oluşturma',
            'is_active'     => 1,
        ]);

        $tag3 = Permission::create([
            'name'          => 'edit-tag',
            'display_name'  => 'tag Düzenleme',
            'is_active'     => 1,
        ]);

        $tag4 = Permission::create([
            'name'          => 'destroy-tag',
            'display_name'  => 'tag Silme',
            'is_active'     => 1,
        ]);

        $tag5 = Permission::create([
            'name'          => 'show-tag',
            'display_name'  => 'tag Gösterme',
            'is_active'     => 1,
        ]);

        //permission
        $permission1 = Permission::create([
            'name'          => 'index-permission',
            'display_name'  => 'permission  Listeleme',
            'is_active'     => 1,
        ]);

        $permission2 = Permission::create([
            'name'          => 'create-permission',
            'display_name'  => 'permission Oluşturma',
            'is_active'     => 1,
        ]);

        $permission3 = Permission::create([
            'name'          => 'edit-permission',
            'display_name'  => 'permission Düzenleme',
            'is_active'     => 1,
        ]);

        $permission4 = Permission::create([
            'name'          => 'destroy-permission',
            'display_name'  => 'permission Silme',
            'is_active'     => 1,
        ]);

        $permission5 = Permission::create([
            'name'          => 'show-permission',
            'display_name'  => 'permission Gösterme',
            'is_active'     => 1,
        ]);

        //revision
        $revision1 = Permission::create([
            'name'          => 'index-revision',
            'display_name'  => 'revision  Listeleme',
            'is_active'     => 1,
        ]);

        $revision2 = Permission::create([
            'name'          => 'create-revision',
            'display_name'  => 'revision Oluşturma',
            'is_active'     => 1,
        ]);

        $revision3 = Permission::create([
            'name'          => 'edit-revision',
            'display_name'  => 'revision Düzenleme',
            'is_active'     => 1,
        ]);

        $revision4 = Permission::create([
            'name'          => 'destroy-revision',
            'display_name'  => 'revision Silme',
            'is_active'     => 1,
        ]);

        $revision5 = Permission::create([
            'name'          => 'show-revision',
            'display_name'  => 'revision Gösterme',
            'is_active'     => 1,
        ]);

        //log
        $log1 = Permission::create([
            'name'          => 'index-log',
            'display_name'  => 'log  Listeleme',
            'is_active'     => 1,
        ]);

        $log2 = Permission::create([
            'name'          => 'create-log',
            'display_name'  => 'log Oluşturma',
            'is_active'     => 1,
        ]);

        $log3 = Permission::create([
            'name'          => 'edit-log',
            'display_name'  => 'log Düzenleme',
            'is_active'     => 1,
        ]);

        $log4 = Permission::create([
            'name'          => 'destroy-log',
            'display_name'  => 'log Silme',
            'is_active'     => 1,
        ]);

        $log5 = Permission::create([
            'name'          => 'show-log',
            'display_name'  => 'log Gösterme',
            'is_active'     => 1,
        ]);

        //account
        $account1 = Permission::create([
            'name'          => 'index-account',
            'display_name'  => 'account  Listeleme',
            'is_active'     => 1,
        ]);

        $account2 = Permission::create([
            'name'          => 'create-account',
            'display_name'  => 'account Oluşturma',
            'is_active'     => 1,
        ]);

        $account3 = Permission::create([
            'name'          => 'edit-account',
            'display_name'  => 'account Düzenleme',
            'is_active'     => 1,
        ]);

        $account4 = Permission::create([
            'name'          => 'destroy-account',
            'display_name'  => 'account Silme',
            'is_active'     => 1,
        ]);

        $account5 = Permission::create([
            'name'          => 'show-account',
            'display_name'  => 'account Gösterme',
            'is_active'     => 1,
        ]);

        //country
        $country1 = Permission::create([
            'name'          => 'index-country',
            'display_name'  => 'country  Listeleme',
            'is_active'     => 1,
        ]);

        $country2 = Permission::create([
            'name'          => 'create-country',
            'display_name'  => 'country Oluşturma',
            'is_active'     => 1,
        ]);

        $country3 = Permission::create([
            'name'          => 'edit-country',
            'display_name'  => 'country Düzenleme',
            'is_active'     => 1,
        ]);

        $country4 = Permission::create([
            'name'          => 'destroy-country',
            'display_name'  => 'country Silme',
            'is_active'     => 1,
        ]);

        $country5 = Permission::create([
            'name'          => 'show-country',
            'display_name'  => 'country Gösterme',
            'is_active'     => 1,
        ]);

        //city
        $city1 = Permission::create([
            'name'          => 'index-city',
            'display_name'  => 'city  Listeleme',
            'is_active'     => 1,
        ]);

        $city2 = Permission::create([
            'name'          => 'create-city',
            'display_name'  => 'city Oluşturma',
            'is_active'     => 1,
        ]);

        $city3 = Permission::create([
            'name'          => 'edit-city',
            'display_name'  => 'city Düzenleme',
            'is_active'     => 1,
        ]);

        $city4 = Permission::create([
            'name'          => 'destroy-city',
            'display_name'  => 'city Silme',
            'is_active'     => 1,
        ]);

        $city5 = Permission::create([
            'name'          => 'show-city',
            'display_name'  => 'city Gösterme',
            'is_active'     => 1,
        ]);

        //contact
        $contact1 = Permission::create([
            'name'          => 'index-contact',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $contact2 = Permission::create([
            'name'          => 'create-contact',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $contact3 = Permission::create([
            'name'          => 'edit-contact',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $contact4 = Permission::create([
            'name'          => 'destroy-contact',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $contact5 = Permission::create([
            'name'          => 'show-contact',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //event
        $event1 = Permission::create([
            'name'          => 'index-event',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $event2 = Permission::create([
            'name'          => 'create-event',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $event3 = Permission::create([
            'name'          => 'edit-event',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $event4 = Permission::create([
            'name'          => 'destroy-event',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $event5 = Permission::create([
            'name'          => 'show-event',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //thememanager
        $thememanager1 = Permission::create([
            'name'          => 'index-thememanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $thememanager2 = Permission::create([
            'name'          => 'create-thememanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $thememanager3 = Permission::create([
            'name'          => 'edit-thememanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $thememanager4 = Permission::create([
            'name'          => 'destroy-thememanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $thememanager5 = Permission::create([
            'name'          => 'show-thememanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        //widgetmanager
        $widgetmanager1 = Permission::create([
            'name'          => 'index-widgetmanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $widgetmanager2 = Permission::create([
            'name'          => 'create-widgetmanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $widgetmanager3 = Permission::create([
            'name'          => 'edit-widgetmanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $widgetmanager4 = Permission::create([
            'name'          => 'destroy-widgetmanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $widgetmanager5 = Permission::create([
            'name'          => 'show-widgetmanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $widgetmanager6 = Permission::create([
            'name'          => 'addWidgetActivation-widgetmanager',
            'display_name'  => 'addWidgetActivation işlemleri',
            'is_active'     => 1,
        ]);

        //modulemanager
        $modulemanager1 = Permission::create([
            'name'          => 'index-modulemanager',
            'display_name'  => 'Dosya Listeleme',
            'is_active'     => 1,
        ]);

        $modulemanager2 = Permission::create([
            'name'          => 'create-modulemanager',
            'display_name'  => 'Dosya Oluşturma',
            'is_active'     => 1,
        ]);

        $modulemanager3 = Permission::create([
            'name'          => 'edit-modulemanager',
            'display_name'  => 'Dosya Düzenleme',
            'is_active'     => 1,
        ]);

        $modulemanager4 = Permission::create([
            'name'          => 'destroy-modulemanager',
            'display_name'  => 'Dosya Silme',
            'is_active'     => 1,
        ]);

        $modulemanager5 = Permission::create([
            'name'          => 'show-modulemanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);

        $modulemanager6 = Permission::create([
            'name'          => 'moduleActivationToggle-modulemanager',
            'display_name'  => 'Dosya Gösterme',
            'is_active'     => 1,
        ]);



        //index_setting
        $index_setting = Permission::create([
            'name'          => 'index-setting',
            'display_name'  => 'Ayarlar bilgilerinin linkleri',
            'is_active'     => 1,
        ]);




        $first_user = User::find(1);
        $super_admin = Role::find(1);

        $super_admin->users()->attach($first_user);

        $super_admin->permissions()->attach($dashboard1);
        $super_admin->permissions()->attach($dashboard2);
        $super_admin->permissions()->attach($document1);
        $super_admin->permissions()->attach($document2);
        $super_admin->permissions()->attach($document3);
        $super_admin->permissions()->attach($document4);
        $super_admin->permissions()->attach($document5);
        $super_admin->permissions()->attach($user1);
        $super_admin->permissions()->attach($user2);
        $super_admin->permissions()->attach($user3);
        $super_admin->permissions()->attach($user4);
        $super_admin->permissions()->attach($user5);
        $super_admin->permissions()->attach($user6);
        $super_admin->permissions()->attach($user7);
        $super_admin->permissions()->attach($user8);
        $super_admin->permissions()->attach($group1);
        $super_admin->permissions()->attach($group2);
        $super_admin->permissions()->attach($group3);
        $super_admin->permissions()->attach($group4);
        $super_admin->permissions()->attach($group5);
        $super_admin->permissions()->attach($role1);
        $super_admin->permissions()->attach($role2);
        $super_admin->permissions()->attach($role3);
        $super_admin->permissions()->attach($role4);
        $super_admin->permissions()->attach($role5);
        $super_admin->permissions()->attach($tag1);
        $super_admin->permissions()->attach($tag2);
        $super_admin->permissions()->attach($tag3);
        $super_admin->permissions()->attach($tag4);
        $super_admin->permissions()->attach($tag5);
        $super_admin->permissions()->attach($permission1);
        $super_admin->permissions()->attach($permission2);
        $super_admin->permissions()->attach($permission3);
        $super_admin->permissions()->attach($permission4);
        $super_admin->permissions()->attach($permission5);
        $super_admin->permissions()->attach($revision1);
        $super_admin->permissions()->attach($revision2);
        $super_admin->permissions()->attach($revision3);
        $super_admin->permissions()->attach($revision4);
        $super_admin->permissions()->attach($revision5);
        $super_admin->permissions()->attach($log1);
        $super_admin->permissions()->attach($log2);
        $super_admin->permissions()->attach($log3);
        $super_admin->permissions()->attach($log4);
        $super_admin->permissions()->attach($log5);
        $super_admin->permissions()->attach($account1);
        $super_admin->permissions()->attach($account2);
        $super_admin->permissions()->attach($account3);
        $super_admin->permissions()->attach($account4);
        $super_admin->permissions()->attach($account5);
        $super_admin->permissions()->attach($country1);
        $super_admin->permissions()->attach($country2);
        $super_admin->permissions()->attach($country3);
        $super_admin->permissions()->attach($country4);
        $super_admin->permissions()->attach($country5);
        $super_admin->permissions()->attach($city1);
        $super_admin->permissions()->attach($city2);
        $super_admin->permissions()->attach($city3);
        $super_admin->permissions()->attach($city4);
        $super_admin->permissions()->attach($city5);
        $super_admin->permissions()->attach($contactType1);
        $super_admin->permissions()->attach($contactType2);
        $super_admin->permissions()->attach($contactType3);
        $super_admin->permissions()->attach($contactType4);
        $super_admin->permissions()->attach($contactType5);
        $super_admin->permissions()->attach($contact1);
        $super_admin->permissions()->attach($contact2);
        $super_admin->permissions()->attach($contact3);
        $super_admin->permissions()->attach($contact4);
        $super_admin->permissions()->attach($contact5);
        $super_admin->permissions()->attach($event1);
        $super_admin->permissions()->attach($event2);
        $super_admin->permissions()->attach($event3);
        $super_admin->permissions()->attach($event4);
        $super_admin->permissions()->attach($event5);
        $super_admin->permissions()->attach($menu1);
        $super_admin->permissions()->attach($menu2);
        $super_admin->permissions()->attach($menu3);
        $super_admin->permissions()->attach($menu4);
        $super_admin->permissions()->attach($menu5);
        $super_admin->permissions()->attach($page1);
        $super_admin->permissions()->attach($page2);
        $super_admin->permissions()->attach($page3);
        $super_admin->permissions()->attach($page4);
        $super_admin->permissions()->attach($page5);
        $super_admin->permissions()->attach($rss1);
        $super_admin->permissions()->attach($rss2);
        $super_admin->permissions()->attach($rss3);
        $super_admin->permissions()->attach($rss4);
        $super_admin->permissions()->attach($rss5);
        $super_admin->permissions()->attach($sitemaps1);
        $super_admin->permissions()->attach($sitemaps2);
        $super_admin->permissions()->attach($sitemaps3);
        $super_admin->permissions()->attach($sitemaps4);
        $super_admin->permissions()->attach($sitemaps5);
        $super_admin->permissions()->attach($announcement1);
        $super_admin->permissions()->attach($announcement2);
        $super_admin->permissions()->attach($announcement3);
        $super_admin->permissions()->attach($announcement4);
        $super_admin->permissions()->attach($announcement5);
        $super_admin->permissions()->attach($thememanager1);
        $super_admin->permissions()->attach($thememanager2);
        $super_admin->permissions()->attach($thememanager3);
        $super_admin->permissions()->attach($thememanager4);
        $super_admin->permissions()->attach($thememanager5);
        $super_admin->permissions()->attach($modulemanager1);
        $super_admin->permissions()->attach($modulemanager2);
        $super_admin->permissions()->attach($modulemanager3);
        $super_admin->permissions()->attach($modulemanager4);
        $super_admin->permissions()->attach($modulemanager5);
        $super_admin->permissions()->attach($modulemanager6);
        $super_admin->permissions()->attach($widgetmanager1);
        $super_admin->permissions()->attach($widgetmanager2);
        $super_admin->permissions()->attach($widgetmanager3);
        $super_admin->permissions()->attach($widgetmanager4);
        $super_admin->permissions()->attach($widgetmanager5);
        $super_admin->permissions()->attach($widgetmanager6);

        $super_admin->permissions()->attach($index_setting);

    }
}
