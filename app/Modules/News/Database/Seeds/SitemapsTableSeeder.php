<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\Sitemap;
use Illuminate\Database\Seeder;

class SitemapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sitemap::create([
            'name'          => 'Haberler',
            'url'           => 'news_sitemap',
            'last_modified' => \Carbon\Carbon::now(),
            'order'         => 3,
            'is_active'     => 1,
        ]);
    }
}
