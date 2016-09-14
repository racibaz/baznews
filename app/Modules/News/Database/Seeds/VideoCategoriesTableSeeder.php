<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\VideoCategory;
use Illuminate\Database\Seeder;

class VideoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoCategory::create([
            'parent_id'                 => null,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Dünya',
            'slug'                      => 'dunya_haberleri',
            'description'               => 'Dünya haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 1,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Asya',
            'slug'                      => 'asya_haberleri',
            'description'               => 'Asya haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 1,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Afrika',
            'slug'                      => 'afrika_haberleri',
            'description'               => 'Afrika haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 1,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Avrupa',
            'slug'                      => 'avrupa_haberleri',
            'description'               => 'Avrupa haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 2,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Azerbaycan',
            'slug'                      => 'azerbaycan_haberleri',
            'description'               => 'Azerbaycan haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 3,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Mali',
            'slug'                      => 'mali_haberleri',
            'description'               => 'Mali haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);

        VideoCategory::create([
            'parent_id'                 => 4,
            '_lft'                      => 1,
            '_rgt'                      => 1,
            'name'                      => 'Türkiye',
            'slug'                      => 'turkiye_haberleri',
            'description'               => 'Türkiye haberleri vs..',
            'keywords'                  => 'keywords',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1,
        ]);
    }
}
