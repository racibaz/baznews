<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\Photo;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'galeri 1',
            'slug' => 'galeri_1',
            'subtitle' => 'galeri_1',
            'file' => 'galeri 1',
            'link' => 'galeri 1',
            'content' => 'galeri 1 tanım',
            'keywords' => 'galeri 1',
            'order' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'galeri 2',
            'subtitle' => 'galeri 2',
            'slug' => 'galeri_2',
            'file' => 'galeri 2',
            'link' => 'galeri 2',
            'content' => 'galeri 2 tanım',
            'keywords' => 'galeri 2',
            'order' => 2,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'galeri 3',
            'subtitle' => 'galeri 3',
            'slug' => 'galeri_3',
            'file' => 'galeri 3',
            'link' => 'galeri 3',
            'content' => 'galeri 3 tanım',
            'keywords' => 'galeri 3',
            'order' => 3,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'galeri 4',
            'subtitle' => 'galeri 4',
            'slug' => 'galeri_4',
            'file' => 'galeri 4',
            'link' => 'galeri 4',
            'content' => 'galeri 4 tanım',
            'keywords' => 'galeri 4',
            'order' => 4,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'galeri 5',
            'subtitle' => 'galeri 5',
            'slug' => 'galeri_5',
            'file' => 'galeri 5',
            'link' => 'galeri 5',
            'content' => 'galeri 5 tanım',
            'keywords' => 'galeri 5',
            'order' => 5,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'galeri 6',
            'subtitle' => 'galeri 6',
            'slug' => 'galeri_6',
            'file' => 'galeri 6',
            'link' => 'galeri 6',
            'content' => 'galeri 6 tanım',
            'keywords' => 'galeri 6',
            'order' => 6,
            'is_active' => 1,
        ]);
    }
}