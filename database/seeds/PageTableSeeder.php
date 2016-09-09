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
            'name'          => 'Sayfa 1',
            'slug'          => 'safya1',
            'content'          => 'Sayyfa içeriği',
            'description'   => 'Sayfa Tanımı',
            'keywords'   => 'metalar',
            'is_active'  => 1,
        ]);
    }
}
