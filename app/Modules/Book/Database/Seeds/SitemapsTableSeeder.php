<?php

namespace App\Modules\Book\Database\Seeds;

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
            'name'          => 'Kitaplar',
            'url'           => 'books_sitemap',
            'last_modified' => \Carbon\Carbon::now(),
            'order'         => 1,
            'is_active'     => 1,
        ]);
    }
}
