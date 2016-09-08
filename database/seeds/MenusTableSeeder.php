<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name'                  => 'Menu 1',
            'url'                   => 'url',
            'slug'                  => 'menu_1',
            'description'           => 'Tanımı',
            'order'                 => 1,
            'is_active'             => 1,
        ]);

        Menu::create([
            'name'                  => 'Menu 2',
            'url'                   => 'url 2',
            'slug'                  => 'menu_2',
            'description'           => 'Tanımı 2',
            'order'                 => 2,
            'is_active'             => 1,
        ]);

        Menu::create([
            'parent_id'             => 2,
            'name'                  => 'Menu 2 alt',
            'url'                   => 'url 2 alt ',
            'slug'                  => 'menu_2 alt',
            'description'           => 'Tanımı 2 alt',
            'order'                 => 3,
            'is_active'             => 1,
        ]);

        Menu::create([
            'name'                  => 'Menu 3',
            'url'                   => 'url 3',
            'slug'                  => 'menu_3',
            'description'           => 'Tanımı 3',
            'order'                 => 4,
            'is_active'             => 1,
        ]);

        Menu::create([
            'parent_id'             => 1,
            'name'                  => 'Menu 1 alt',
            'url'                   => 'url alt',
            'slug'                  => 'menu_1 alt',
            'description'           => 'Tanımı alt',
            'order'                 => 5,
            'is_active'             => 1,
        ]);
    }
}
