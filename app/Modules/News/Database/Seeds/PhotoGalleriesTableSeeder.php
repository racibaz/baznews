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
            'title' => 'ilk photo gallery 1',
            'slug' => 'ilk_photo_gallery-1',
            'description' => 'galeri tanım/not',
            'keywords' => 'ilk galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 2,
            'user_id' => 1,
            'title' => 'ikinci photo gallery 2',
            'slug' => 'ikinci_photo_gallery-2',
            'description' => 'galeri tanım/not',
            'keywords' => 'ikinci galeri',
            'thumbnail' => '8.jpg',
            'is_cuff' => 1,
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 1,
            'user_id' => 1,
            'title' => 'üç photo gallery 3',
            'slug' => 'uc_photo_gallery-3',
            'description' => 'galeri tanım/not',
            'keywords' => 'üç galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 0,
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 3,
            'user_id' => 1,
            'title' => 'dört photo gallery 4',
            'slug' => 'dort_photo_gallery-4',
            'description' => 'galeri tanım/not',
            'keywords' => 'dört galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 0,
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 4,
            'user_id' => 1,
            'title' => 'beş photo gallery 5',
            'slug' => 'bes_photo_gallery-5',
            'description' => 'galeri tanım/not',
            'keywords' => 'beş galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 0,
            'is_active' => 1,
        ]);

        PhotoGallery::create([
            'photo_category_id' => 5,
            'user_id' => 2,
            'title' => 'altı photo gallery 6',
            'slug' => 'alti_photo_gallery-6',
            'description' => 'galeri tanım/not',
            'keywords' => 'altı galeri',
            'thumbnail' => '1.jpg',
            'is_cuff' => 0,
            'is_active' => 1,
        ]);
    }
}