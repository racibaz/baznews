<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewsCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Dünya',
            'slug' => 'dunya_haberleri',
            'description' => 'Dünya haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Ekonomi',
            'slug' => 'ekonomi_haberleri',
            'description' => 'Ekonomi haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Spor',
            'slug' => 'spor_haberleri',
            'description' => 'Spor haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => null,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Kültür Sanat',
            'slug' => 'kultur_sanat_haberleri',
            'description' => 'Avrupa haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => 4,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Müzik',
            'slug' => 'muzik_haberleri',
            'description' => 'Müzik haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => 4,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Tiyatro',
            'slug' => 'tiyatro_haberleri',
            'description' => 'Tiyatro haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        NewsCategory::create([
            'parent_id' => 1,
            '_lft' => 1,
            '_rgt' => 1,
            'name' => 'Türkiye',
            'slug' => 'turkiye_haberleri',
            'description' => 'Türkiye haberleri vs..',
            'keywords' => 'keywords',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}