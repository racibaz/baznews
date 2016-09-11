<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\NewsSource;
use Illuminate\Database\Seeder;

class NewsSourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsSource::create([
            'name'                  => 'İHH',
            'url'                   => 'ihh_url',
            'is_active'             => 1
        ]);

        NewsSource::create([
            'name'                  => 'DHA',
            'url'                   => 'dha_url',
            'is_active'             => 1
        ]);

        NewsSource::create([
            'name'                  => 'Medya Takip',
            'is_active'             => 1
        ]);

        NewsSource::create([
            'name'                  => 'Anadolu Haber Ajansı',
            'url'                   => 'aa_url',
            'is_active'             => 1
        ]);
    }
}
