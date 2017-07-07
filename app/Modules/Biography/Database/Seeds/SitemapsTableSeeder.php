<?php

namespace App\Modules\Biography\Database\Seeds;

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
            'name' => 'Biyografiler',
            'url' => 'biographies_sitemap',
            'last_modified' => \Carbon\Carbon::now(),
            'order' => 2,
            'is_active' => 1,
        ]);
    }
}
