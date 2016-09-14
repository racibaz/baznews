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
            'name' => ' video video galeri 1',
            'slug' => 'video galeri_1',
            'file' => 'video galeri 1',
            'link' => 'video galeri 1',
            'description' => 'video galeri 1 tanım',
            'keywords' => 'video galeri 1',
            'order' => 1,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video galeri 2',
            'slug' => 'video galeri_2',
            'file' => 'video galeri 2',
            'link' => 'video galeri 2',
            'description' => 'video galeri 2 tanım',
            'keywords' => 'video galeri 2',
            'order' => 2,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video galeri 3',
            'slug' => 'video galeri_3',
            'file' => 'video galeri 3',
            'link' => 'video galeri 3',
            'description' => 'video galeri 3 tanım',
            'keywords' => 'video galeri 3',
            'order' => 3,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video galeri 4',
            'slug' => 'video galeri_4',
            'file' => 'video galeri 4',
            'link' => 'video galeri 4',
            'description' => 'video galeri 4 tanım',
            'keywords' => 'video galeri 4',
            'order' => 4,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 3,
            'name' => 'video galeri 5',
            'slug' => 'video galeri_5',
            'file' => 'video galeri 5',
            'link' => 'video galeri 5',
            'description' => 'video galeri 5 tanım',
            'keywords' => 'video galeri 5',
            'order' => 5,
            'is_active' => 1,
        ]);
    }
}