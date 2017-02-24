<?php

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'name'          => 'Kunye',
            'slug'          => 'kunye',
            'content'          => 'kunye içeriği',
            'description'   => 'tanımı',
            'keywords'   => 'metalar',
            'is_comment'  => 1,
            'is_active'  => 1,
        ]);

        Page::create([
            'name'          => 'Sayfa 1',
            'slug'          => 'safya-1',
            'content'          => 'Sayyfa içeriği',
            'description'   => 'Sayfa Tanımı',
            'keywords'   => 'metalar',
            'is_comment'  => 1,
            'is_active'  => 1,
        ]);
    }
}
