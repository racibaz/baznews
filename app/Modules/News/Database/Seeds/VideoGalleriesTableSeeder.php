<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\VideoGallery;
use Illuminate\Database\Seeder;

class VideoGalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoGallery::create([
            'video_category_id' => 1,
            'user_id' => 1,
            'title' => 'ilk video gallery',
            'slug' => 'ilk_video_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'ilk galeri',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 2,
            'user_id' => 1,
            'title' => 'ikinci video gallery',
            'slug' => 'ikinci_video_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'ikinci galeri',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 1,
            'user_id' => 1,
            'title' => 'üç video gallery',
            'slug' => 'üç_video_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'üç galeri',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 3,
            'user_id' => 1,
            'title' => 'dört video gallery',
            'slug' => 'dört_video_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'dört galeri',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 4,
            'user_id' => 1,
            'title' => 'beş video gallery',
            'slug' => 'beş_video_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'beş galeri',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}