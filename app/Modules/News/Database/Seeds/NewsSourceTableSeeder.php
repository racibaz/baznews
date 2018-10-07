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
            'name' => 'İHA',
            'url' => 'http://www.iha.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'DHA',
            'url' => 'http://www.dha.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'Medya Takip',
            'url' => 'http://www.medyatakip.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'Anadolu Haber Ajansı',
            'url' => 'http://www.aa.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'SANATLOG',
            'url' => 'http://www.sanatlog.com',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'Dağ Medya',
            'url' => 'https://dagmedya.net/',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'Mürekkep Haber',
            'url' => 'http://www.murekkephaber.com',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'Hayal Perdesi',
            'url' => 'http://www.hayalperdesi.net',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'islamveihsan.com',
            'url' => 'http://www.islamveihsan.com',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'ntv',
            'url' => 'https://www.ntv.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'hurriyet',
            'url' => 'http://www.hurriyet.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'milliyet',
            'url' => 'http://www.milliyet.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'LaleGülHaber',
            'url' => 'https://www.lalegulhaber.com.tr',
            'is_active' => 1
        ]);

        NewsSource::create([
            'name' => 'EnSonHaber',
            'url' => 'http://www.ensonhaber.com',
            'is_active' => 1
        ]);
    }
}
