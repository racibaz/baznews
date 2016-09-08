<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title'                 => 'Menu 1',
            'slug'                  => 'url',
            'content'               => 'menu_1',
            'keywords'              => 'meta',
            'is_active'             => 1,
        ]);

    }
}
