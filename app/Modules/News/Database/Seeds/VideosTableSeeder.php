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
            'thumbnail' => 'video 1',
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
            'thumbnail' => 'video 2',
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
            'thumbnail' => 'video 3',
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
            'thumbnail' => 'video 4',
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
            'thumbnail' => 'video 5',
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
            'thumbnail' => 'video 6',
            'link' => 'video 6',
            'content' => 'video 6 tanım',
            'keywords' => 'video 6',
            'order' => 6,
            'is_active' => 1,
        ]);

    }
}