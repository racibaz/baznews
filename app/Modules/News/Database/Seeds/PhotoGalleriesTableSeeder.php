<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\PhotoGallery;
use Illuminate\Database\Seeder;

class PhotoGalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhotoGallery::create([
            'photo_category_id' => 1,
            'user_id' => 1,
            'title' => 'ilk photo gallery',
            'slug' => 'ilk_photo_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'ilk galeri',
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 2,
            'user_id' => 1,
            'title' => 'ikinci photo gallery',
            'slug' => 'ikinci_photo_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'ikinci galeri',
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 1,
            'user_id' => 1,
            'title' => 'üç photo gallery',
            'slug' => 'üç_photo_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'üç galeri',
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 3,
            'user_id' => 1,
            'title' => 'dört photo gallery',
            'slug' => 'dört_photo_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'dört galeri',
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 4,
            'user_id' => 1,
            'title' => 'beş photo gallery',
            'slug' => 'beş_photo_gallery',
            'description' => 'galeri tanım/not',
            'keywords' => 'beş galeri',
            'is_active' => 1,
        ]);
    }
}