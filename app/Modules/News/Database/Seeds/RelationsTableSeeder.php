<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\News;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoGallery;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoGallery;
use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $news1 = News::find(1)->first();
        $news2 = News::find(2)->first();
        $news3 = News::find(3)->first();
        $news4 = News::find(4)->first();

        $news1->photo_galleries()->attach(1);
        $news2->photo_galleries()->attach(2);
        $news3->photo_galleries()->attach(3);
        $news3->photo_galleries()->attach(4);


        $news1->photos()->attach(1);
        $news2->photos()->attach(2);
        $news2->photos()->attach(3);
        $news2->photos()->attach(4);
        $news3->photos()->attach(1);
        $news3->photos()->attach(2);
        $news3->photos()->attach(3);
        $news4->photos()->attach(4);

        $news1->video_galleries()->attach(1);
        $news2->video_galleries()->attach(2);
        $news3->video_galleries()->attach(3);
//        $news3->video_galleries()->attach($videoGallery4);
        $news4->video_galleries()->attach(5);


        $news1->videos()->attach(1);
        $news2->videos()->attach(2);
        $news3->videos()->attach(1);
        $news4->videos()->attach(4);

        $news1->tags()->attach(1);
        $news2->tags()->attach(2);
        $news3->tags()->attach(3);
        $news4->tags()->attach(4);
    }
}