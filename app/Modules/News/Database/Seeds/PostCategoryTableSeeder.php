<?php

use App\Modules\News\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::create([
            'parent_id'                 =>  null,
            'name'                      => 'Dünya',
            'slug'                      => 'dunyadan_haberler',
            'description'               => 'Dünya Haberler',
            'keywords'                  => 'Dünyadan haberler vs... ',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);

        PostCategory::create([
            'parent_id'                 =>  1,
            'name'                      => 'Ortadoğu',
            'slug'                      => 'ortdadugu_haberleri',
            'description'               => 'Ortadoğu Haberler',
            'keywords'                  => 'Ortadoğu haberleri... ',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);

        PostCategory::create([
            'parent_id'                 =>  1,
            'name'                      => 'Asya',
            'slug'                      => 'asya_haberleri',
            'description'               => 'Asya Haberleri',
            'keywords'                  => 'Asya Haberleri... ',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);

        PostCategory::create([
            'parent_id'                 =>  1,
            'name'                      => 'Avrupa',
            'slug'                      => 'avrupa',
            'description'               => 'Avrupa Haberleri...',
            'keywords'                  => 'Avrupa Haberleri...',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);

        PostCategory::create([
            'parent_id'                 =>  null,
            'name'                      => 'Spor',
            'slug'                      => 'spor_haberleri',
            'description'               => 'Spor Haberleri',
            'keywords'                  => 'Spor Haberleri...',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);

        PostCategory::create([
            'parent_id'                 =>  null,
            'name'                      => 'Basketbol',
            'slug'                      => 'basketbol',
            'description'               => 'basketbol Haberleri',
            'keywords'                  => 'basketbol Haberleri...',
            'hit'                       => 1,
            'icon'                      => 'icon path',
            'is_cuff'                   => 1,
            'is_active'                 => 1
        ]);
    }
}