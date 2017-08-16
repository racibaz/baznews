<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Homepage',
            'slug'                      => 'homepage',
            'url'                       => '/',
            'target'                    => '_blank',
            'icon'                      => '<i class="fa fa-home" aria-hidden="true"></i>',
            'order'                     => 1,
            'is_header'                 => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'menü 1',
            'slug'                      => 'menu1',
            'url'                       => 'link',
            'icon'                      => 'icon',
            'order'                     => 1,
            'is_header'                 => 1,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'page_id'                   => 1,
            'name'                      => 'Künye',
            'slug'                      => 'kunye',
            'target'                    => '_blank',
            'order'                     => 1,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Dış Link',
            'slug'                      => 'dis-link',
            'url'                       => 'http://bazsoft.biz/',
            'target'                    => '_blank',
            'order'                     => 1,
            'is_header'                 => 1,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Site Haritası',
            'slug'                      => 'site-haritasi',
            'route'                     => 'sitemap.xml',
            'target'                    => '_blank',
            'icon'                      => '<i class="fa fa-sitemap" aria-hidden="true"></i>',
            'order'                     => 100,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'rss.xml',
            'slug'                      => 'rss.xml',
            'route'                     => 'rss.xml',
            'target'                    => '_blank',
            'icon'                      => '<i class="fa fa-rss" aria-hidden="true"></i>',
            'order'                     => 100,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);

        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'İletişim',
            'slug'                      => 'iletisim',
            'route'                     => 'contact',
            'target'                    => '_blank',
            'icon'                      => '<i class="fa fa-address-card" aria-hidden="true"></i>',
            'order'                     => 100,
            'is_footer'                 => 1,
            'is_active'                 => 1,
        ]);

    }
}
