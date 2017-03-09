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
            'url'                       => 'http://baznews.app',
            'target'                    => '_blank',
            'icon'                      => '<i class="fa fa-home" aria-hidden="true"></i>',
            'order'                     => 1,
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
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'page_id'                   => 1,
            'name'                      => 'Künye',
            'slug'                      => 'kunye',
            'icon'                      => 'icon',
            'order'                     => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Dış Link',
            'slug'                      => 'dis-link',
            'url'                       => 'http://www.receptayyiperdogan.name',
            'icon'                      => 'icon',
            'order'                     => 1,
            'is_active'                 => 1,
        ]);
    }
}
