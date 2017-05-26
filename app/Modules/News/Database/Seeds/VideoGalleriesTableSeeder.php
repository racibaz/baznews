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
            'title' => 'ilk video gallery 1',
            'slug' => 'ilk_video_gallery-1',
            'description' => 'galeri tanım/not',
            'keywords' => 'ilk galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 2,
            'user_id' => 1,
            'title' => 'ikinci video gallery 2',
            'slug' => 'ikinci_video_gallery-2',
            'description' => 'galeri tanım/not',
            'keywords' => 'ikinci galeri',
            'thumbnail' => '2.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 1,
            'user_id' => 1,
            'title' => 'üç video gallery 3',
            'slug' => 'uc_video_gallery-3',
            'description' => 'galeri tanım/not',
            'keywords' => 'üç galeri',
            'thumbnail' => '3.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 3,
            'user_id' => 1,
            'title' => 'dört video gallery 4',
            'slug' => 'dort_video_gallery-4',
            'description' => 'galeri tanım/not',
            'keywords' => 'dört galeri',
            'thumbnail' => '4.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        VideoGallery::create([
            'video_category_id' => 4,
            'user_id' => 1,
            'title' => 'beş video gallery 5',
            'slug' => 'bes_video_gallery-5',
            'description' => 'galeri tanım/not',
            'keywords' => 'beş galeri',
            'thumbnail' => '5.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);
    }
}