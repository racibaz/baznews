<?php

namespace App\Modules\Article\Database\Seeds;

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
            'name' => 'Makaleler',
            'url' => 'articles_sitemap',
            'last_modified' => \Carbon\Carbon::now(),
            'order' => 2,
            'is_active' => 1,
        ]);
    }
}
