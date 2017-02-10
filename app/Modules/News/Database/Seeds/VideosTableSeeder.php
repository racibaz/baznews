<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\Video;
use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 1',
            'slug' => 'video_1',
            'subtitle' => 'video_1',
            'thumbnail' => '1.jpg',
            'file' => '1.mp4',
            'link' => 'video 1',
            'content' => 'video 1 tanım',
            'keywords' => 'video 1',
            'order' => 1,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 2',
            'slug' => 'video_2',
            'subtitle' => 'video_2',
            'thumbnail' => '2.jpg',
            'file' => '2.mp4',
            'link' => 'video 2',
            'content' => 'video 2 tanım',
            'keywords' => 'video 2',
            'order' => 2,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 3',
            'slug' => 'video_3',
            'subtitle' => 'video_3',
            'thumbnail' => '3.jpg',
            'file' => '3.mp4',
            'link' => 'video 3',
            'content' => 'video 3 tanım',
            'keywords' => 'video 3',
            'order' => 3,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 4',
            'slug' => 'video_4',
            'subtitle' => 'video_4',
            'thumbnail' => '4.jpg',
            'file' => '4.mp4',
            'link' => 'video 4',
            'content' => 'video 4 tanım',
            'keywords' => 'video 4',
            'order' => 4,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 5',
            'slug' => 'video_5',
            'subtitle' => 'video_5',
            'file' => '5.mp4',
            'thumbnail' => '5.jpg',
            'link' => 'video 5',
            'content' => 'video 5 tanım',
            'keywords' => 'video 5',
            'order' => 5,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 6',
            'slug' => 'video_6',
            'subtitle' => 'video_6',
            'thumbnail' => '6.jpg',
            'file' => '6.mp4',
            'link' => 'video 6',
            'content' => 'video 6 tanım',
            'keywords' => 'video 6',
            'order' => 6,
            'is_active' => 1,
        ]);

        //video gallery 2
        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 7',
            'slug' => 'video_7',
            'subtitle' => 'video_7',
            'thumbnail' => '7.jpg',
            'file' => '7.mp4',
            'link' => 'video 7',
            'content' => 'video 7 tanım',
            'keywords' => 'video 7',
            'order' => 7,
            'is_active' => 1,
        ]);


        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 8',
            'slug' => 'video_8',
            'subtitle' => 'video_8',
            'thumbnail' => '8.jpg',
            'file' => '8.mp4',
            'link' => 'video 8',
            'content' => 'video 8 tanım',
            'keywords' => 'video 8',
            'order' => 8,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 9',
            'slug' => 'video_9',
            'subtitle' => 'video_9',
            'thumbnail' => '9.jpg',
            'file' => '9.mp4',
            'link' => 'video 9',
            'content' => 'video 9 tanım',
            'keywords' => 'video 9',
            'order' => 9,
            'is_active' => 1,
        ]);


        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 10',
            'slug' => 'video_10',
            'subtitle' => 'video_10',
            'thumbnail' => '10.jpg',
            'file' => '10.mp4',
            'link' => 'video 10',
            'content' => 'video 10 tanım',
            'keywords' => 'video 10',
            'order' => 10,
            'is_active' => 1,
        ]);


        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 11',
            'slug' => 'video_11',
            'subtitle' => 'video_11',
            'thumbnail' => '11.jpg',
            'file' => '11.mp4',
            'link' => 'video 11',
            'content' => 'video 11 tanım',
            'keywords' => 'video 11',
            'order' => 11,
            'is_active' => 1,
        ]);
    }
}