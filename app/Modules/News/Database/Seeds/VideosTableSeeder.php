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
            'slug' => 'video-1',
            'subtitle' => 'video-1',
            'thumbnail' => '1.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Og6chVXFx98" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 1 tanım',
            'keywords' => 'video 1',
            'order' => 1,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 1,
            'name' => 'video 2',
            'slug' => 'video-2',
            'subtitle' => 'video-2',
            'thumbnail' => '2.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/2xbQsV6TnQ0" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 2 tanım',
            'keywords' => 'video 2',
            'order' => 2,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 3',
            'slug' => 'video-3',
            'subtitle' => 'video-3',
            'thumbnail' => '3.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/NZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 3 tanım',
            'keywords' => 'video 3',
            'order' => 3,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 2,
            'name' => 'video 4',
            'slug' => 'video-4',
            'subtitle' => 'video-4',
            'thumbnail' => '4.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/NZJD-0MYrao?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 4 tanım',
            'keywords' => 'video 4',
            'order' => 4,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 3,
            'name' => 'video 5',
            'slug' => 'video-5',
            'subtitle' => 'video-5',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/TwozltVHrDM?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'thumbnail' => '5.jpg',
            'content' => 'video 5 tanım',
            'keywords' => 'video 5',
            'order' => 5,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 4,
            'name' => 'video 6',
            'slug' => 'video-6',
            'subtitle' => 'video-6',
            'thumbnail' => '6.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/2xbQsV6TnQ0?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 6 tanım',
            'keywords' => 'video 6',
            'order' => 6,
            'is_active' => 1,
        ]);

        //video gallery 2
        Video::create([
            'video_gallery_id' => 4,
            'name' => 'video 7',
            'slug' => 'video-7',
            'subtitle' => 'video-7',
            'thumbnail' => '7.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/L8FiofZAP48?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 7 tanım',
            'keywords' => 'video 7',
            'order' => 7,
            'is_active' => 1,
        ]);


        Video::create([
            'video_gallery_id' => 5,
            'name' => 'video 8',
            'slug' => 'video-8',
            'subtitle' => 'video-8',
            'thumbnail' => '8.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/WtagiFk_Vys?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 8 tanım',
            'keywords' => 'video 8',
            'order' => 8,
            'is_active' => 1,
        ]);

        Video::create([
            'video_gallery_id' => 5,
            'name' => 'video 9',
            'slug' => 'video-9',
            'subtitle' => 'video-9',
            'thumbnail' => '9.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/Fza5RCRdAHE?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 9 tanım',
            'keywords' => 'video 9',
            'order' => 9,
            'is_active' => 1,
        ]);


        Video::create([
//            'video_gallery_id' => 5,
            'name' => 'video 10',
            'slug' => 'video-10',
            'subtitle' => 'video-10',
            'thumbnail' => '10.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/JPp4c_MG5Tc?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 10 tanım',
            'keywords' => 'video 10',
            'order' => 10,
            'is_active' => 1,
        ]);


        Video::create([
//            'video_gallery_id' => 5,
            'name' => 'video 11',
            'slug' => 'video-11',
            'subtitle' => 'video-11',
            'thumbnail' => '11.jpg',
            'embed' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/kACi2QLNKLY?list=RDNZJD-0MYrao" frameborder="0" allowfullscreen></iframe>',
            'content' => 'video 11 tanım',
            'keywords' => 'video 11',
            'order' => 11,
            'is_active' => 1,
        ]);
    }
}