<?php

namespace App\Modules\News\Database\Seeds;

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
            'name' => 'Tüm Haberler',
            'url' => 'rss/all_news',
            'order' => 1,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'Manşetler Haberler',
            'url' => 'rss/box_cuff',
            'order' => 1,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'Son Dakika Haberler',
            'url' => 'rss/break_news',
            'order' => 2,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'Band Haberler',
            'url' => 'rss/band_news',
            'order' => 3,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'Ana Manşetler',
            'url' => 'rss/main_cuff',
            'order' => 1,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'İkinci Manşetler',
            'url' => 'rss/mini_cuff',
            'order' => 1,
            'is_active' => 1
        ]);

        \App\Models\Rss::create([
            'name' => 'Videolar',
            'url' => 'rss/videos',
            'order' => 1,
            'is_active' => 1
        ]);
    }
}
