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
            'name'                      => 'menü 2',
            'slug'                      => 'menu2',
            'url'                       => 'link',
            'icon'                      => 'icon',
            'order'                     => 1,
            'is_active'                 => 1,
        ]);


        Menu::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'menü 3',
            'slug'                      => 'menu3',
            'url'                       => 'link',
            'icon'                      => 'icon',
            'order'                     => 1,
            'is_active'                 => 1,
        ]);
    }
}
