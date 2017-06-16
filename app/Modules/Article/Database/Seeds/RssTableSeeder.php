<?php

namespace App\Modules\Article\Database\Seeds;

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
            'name'              => 'Makaleler',
            'url'               => 'rss/articles',
            'order'             => 1,
            'is_active'         => 1
        ]);
    }
}
