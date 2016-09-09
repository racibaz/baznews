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
            'page_id'       => 1,
            'name'          => 'menü 1',
            'slug'          => 'menu1',
            'url'           => 'link',
            'icon'          => 'icon',
            'order'         => 1,
            'is_active'  => 1,
        ]);
    }
}
