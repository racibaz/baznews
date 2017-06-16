<?php

namespace App\Modules\Biography\Database\Seeds;

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
            'name'              => 'Biyografiler',
            'url'               => 'rss/biographies',
            'order'             => 1,
            'is_active'         => 1
        ]);
    }
}
