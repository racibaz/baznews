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
            'name' => 'photo 1',
            'slug' => 'photo-1',
            'subtitle' => 'photo_1',
            'file' => '1.jpg',
            'link' => 'photo 1',
            'content' => 'photo 1 tanım',
            'keywords' => 'photo 1',
            'order' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 2',
            'subtitle' => 'photo 2',
            'slug' => 'photo-2',
            'file' => '2.jpg',
            'link' => 'photo 2',
            'content' => 'photo 2 tanım',
            'keywords' => 'photo 2',
            'order' => 2,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 3',
            'subtitle' => 'photo 3',
            'slug' => 'photo-3',
            'file' => '3.jpg',
            'link' => 'photo 3',
            'content' => 'photo 3 tanım',
            'keywords' => 'photo 3',
            'order' => 3,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 4',
            'subtitle' => 'photo 4',
            'slug' => 'photo-4',
            'file' => '4.jpg',
            'link' => 'photo 4',
            'content' => 'photo 4 tanım',
            'keywords' => 'photo 4',
            'order' => 4,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 5',
            'subtitle' => 'photo 5',
            'slug' => 'photo-5',
            'file' => '5.jpg',
            'link' => 'photo 5',
            'content' => 'photo 5 tanım',
            'keywords' => 'photo 5',
            'order' => 5,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 6',
            'subtitle' => 'photo 6',
            'slug' => 'photo-6',
            'file' => '6.jpg',
            'link' => 'photo 6',
            'content' => 'photo 6 tanım',
            'keywords' => 'photo 6',
            'order' => 6,
            'is_active' => 1,
        ]);

        //photo gallery 2

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 7',
            'subtitle' => 'photo 7',
            'slug' => 'photo-7',
            'file' => '7.jpg',
            'link' => 'photo 7',
            'content' => 'photo 7 tanım',
            'keywords' => 'photo 7',
            'order' => 7,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 8',
            'subtitle' => 'photo 8',
            'slug' => 'photo-8',
            'file' => '8.jpg',
            'link' => 'photo 8',
            'content' => 'photo 8 tanım',
            'keywords' => 'photo 8',
            'order' => 8,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 9',
            'subtitle' => 'photo 9',
            'slug' => 'photo-9',
            'file' => '9.jpg',
            'link' => 'photo 9',
            'content' => 'photo 9 tanım',
            'keywords' => 'photo 9',
            'order' => 9,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 10',
            'subtitle' => 'photo 10',
            'slug' => 'photo-10',
            'file' => '10.jpg',
            'link' => 'photo 10',
            'content' => 'photo 10 tanım',
            'keywords' => 'photo 10',
            'order' => 10,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 11',
            'subtitle' => 'photo 11',
            'slug' => 'photo-11',
            'file' => '11.jpg',
            'link' => 'photo 11',
            'content' => 'photo 11 tanım',
            'keywords' => 'photo 11',
            'order' => 11,
            'is_active' => 1,
        ]);
    }
}