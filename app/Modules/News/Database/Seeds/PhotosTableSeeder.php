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
            'file' => '1.png',
            'content' => 'photo 1 tanım',
            'keywords' => 'photo 1',
            'order' => 1,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 2',
            'subtitle' => 'photo 2',
            'slug' => 'photo-2',
            'file' => '2.png',
            'content' => 'photo 2 tanım',
            'keywords' => 'photo 2',
            'order' => 2,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 3',
            'subtitle' => 'photo 3',
            'slug' => 'photo-3',
            'file' => '3.png',
            'content' => 'photo 3 tanım',
            'keywords' => 'photo 3',
            'order' => 3,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 4',
            'subtitle' => 'photo 4',
            'slug' => 'photo-4',
            'file' => '4.png',
            'content' => 'photo 4 tanım',
            'keywords' => 'photo 4',
            'order' => 4,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 5',
            'subtitle' => 'photo 5',
            'slug' => 'photo-5',
            'file' => '5.png',
            'content' => 'photo 5 tanım',
            'keywords' => 'photo 5',
            'order' => 5,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 1,
            'name' => 'photo 6',
            'subtitle' => 'photo 6',
            'slug' => 'photo-6',
            'file' => '6.png',
            'content' => 'photo 6 tanım',
            'keywords' => 'photo 6',
            'order' => 6,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        //photo gallery 2

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 7',
            'subtitle' => 'photo 7',
            'slug' => 'photo-7',
            'file' => '7.png',
            'content' => 'photo 7 tanım',
            'keywords' => 'photo 7',
            'order' => 7,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 8',
            'subtitle' => 'photo 8',
            'slug' => 'photo-8',
            'file' => '8.png',
            'content' => 'photo 8 tanım',
            'keywords' => 'photo 8',
            'order' => 8,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 9',
            'subtitle' => 'photo 9',
            'slug' => 'photo-9',
            'file' => '9.png',
            'content' => 'photo 9 tanım',
            'keywords' => 'photo 9',
            'order' => 9,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 10',
            'subtitle' => 'photo 10',
            'slug' => 'photo-10',
            'file' => '10.png',
            'content' => 'photo 10 tanım',
            'keywords' => 'photo 10',
            'order' => 10,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 11',
            'subtitle' => 'photo 11',
            'slug' => 'photo-11',
            'file' => '11.png',
            'content' => 'photo 11 tanım',
            'keywords' => 'photo 11',
            'order' => 11,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 2,
            'name' => 'photo 12',
            'subtitle' => 'photo 12',
            'slug' => 'photo-12',
            'file' => '12.png',
            'content' => 'photo 12 tanım',
            'keywords' => 'photo 12',
            'order' => 12,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 4,
            'name' => 'photo 13',
            'subtitle' => 'photo 13',
            'slug' => 'photo-13',
            'file' => '13.png',
            'content' => 'photo 13 tanım',
            'keywords' => 'photo 13',
            'order' => 13,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 4,
            'name' => 'photo 14',
            'subtitle' => 'photo 14',
            'slug' => 'photo-14',
            'file' => '14.png',
            'content' => 'photo 14 tanım',
            'keywords' => 'photo 14',
            'order' => 14,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'photo 15',
            'subtitle' => 'photo 15',
            'slug' => 'photo-15',
            'file' => '15.png',
            'content' => 'photo 15 tanım',
            'keywords' => 'photo 15',
            'order' => 15,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'photo 16',
            'subtitle' => 'photo 16',
            'slug' => 'photo-16',
            'file' => '16.png',
            'content' => 'photo 16 tanım',
            'keywords' => 'photo 16',
            'order' => 16,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'photo 17',
            'subtitle' => 'photo 17',
            'slug' => 'photo-17',
            'file' => '17.png',
            'content' => 'photo 17 tanım',
            'keywords' => 'photo 17',
            'order' => 17,
            'is_comment' => 1,
            'is_active' => 1,
        ]);

        Photo::create([
            'photo_gallery_id' => 3,
            'name' => 'photo 18',
            'subtitle' => 'photo 18',
            'slug' => 'photo-18',
            'file' => '18.png',
            'content' => 'photo 18 tanım',
            'keywords' => 'photo 18',
            'order' => 18,
            'is_comment' => 1,
            'is_active' => 1,
        ]);
    }
}