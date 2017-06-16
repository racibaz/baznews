<?php

namespace App\Modules\Book\Database\Seeds;

use Illuminate\Database\Seeder;

class RssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Rss::create([
            'name'              => 'Kitaplar',
            'url'               => 'rss/books',
            'order'             => 1,
            'is_active'         => 1
        ]);
    }
}
