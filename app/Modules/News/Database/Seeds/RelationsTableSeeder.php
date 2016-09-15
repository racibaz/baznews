<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
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

        $photoGallery1 = PhotoGallery::find(1)->first();
        $photoGallery2 = PhotoGallery::find(2)->first();
        $photoGallery3 = PhotoGallery::find(3)->first();
        $photoGallery4 = PhotoGallery::find(4)->first();
        $photoGallery5 = PhotoGallery::find(5)->first();

        $photo1 = Photo::find(1)->first();
        $photo2 = Photo::find(2)->first();
        $photo3 = Photo::find(3)->first();
        $photo4 = Photo::find(4)->first();
        $photo5 = Photo::find(5)->first();


        $news1->photo_galleries()->attach($photoGallery1);
        $news1->photo_galleries()->attach($photoGallery2);
        $news1->photo_galleries()->attach($photoGallery3);
        $news2->photo_galleries()->attach($photoGallery2);
        $news3->photo_galleries()->attach($photoGallery3);
        $news3->photo_galleries()->attach($photoGallery4);
        $news4->photo_galleries()->attach($photoGallery5);


        $news1->photos()->attach($photo1);
        $news1->photos()->attach($photo2);
        $news1->photos()->attach($photo3);
        $news1->photos()->attach($photo4);
        $news1->photos()->attach($photo5);
        $news2->photos()->attach($photo2);
        $news2->photos()->attach($photo3);
        $news2->photos()->attach($photo4);
        $news3->photos()->attach($photo3);
        $news3->photos()->attach($photo3);
        $news3->photos()->attach($photo3);
        $news4->photos()->attach($photo4);





        $videoGallery1 = VideoGallery::find(1)->first();
        $videoGallery2 = VideoGallery::find(2)->first();
        $videoGallery3 = VideoGallery::find(3)->first();
        $videoGallery4 = VideoGallery::find(4)->first();
        $videoGallery5 = VideoGallery::find(5)->first();

        $video1 = Video::find(1)->first();
        $video2 = Video::find(2)->first();
        $video3 = Video::find(3)->first();
        $video4 = Video::find(4)->first();
        $video5 = Video::find(5)->first();


        $news1->video_galleries()->attach($videoGallery1);
        $news1->video_galleries()->attach($videoGallery2);
        $news1->video_galleries()->attach($videoGallery3);
        $news2->video_galleries()->attach($videoGallery2);
        $news3->video_galleries()->attach($videoGallery3);
        $news3->video_galleries()->attach($videoGallery4);
        $news4->video_galleries()->attach($videoGallery5);


        $news1->videos()->attach($video1);
        $news1->videos()->attach($video2);
        $news1->videos()->attach($video3);
        $news1->videos()->attach($video4);
        $news1->videos()->attach($video5);
        $news2->videos()->attach($video2);
        $news2->videos()->attach($video3);
        $news2->videos()->attach($video4);
        $news3->videos()->attach($video3);
        $news3->videos()->attach($video3);
        $news3->videos()->attach($video3);
        $news4->videos()->attach($video4);







//        $newsCategory1 = NewsCategory::find(1)->first();
//        $newsCategory2 = NewsCategory::find(2)->first();
//        $newsCategory3 = NewsCategory::find(3)->first();
//        $newsCategory4 = NewsCategory::find(4)->first();
//        $newsCategory5 = NewsCategory::find(5)->first();
//        $newsCategory6 = NewsCategory::find(6)->first();
//        $newsCategory7 = NewsCategory::find(7)->first();
//
//
//        $news1->news_categories()->attach($newsCategory1);
//        $news1->news_categories()->attach($newsCategory2);
//        $news1->news_categories()->attach($newsCategory3);
//        $news1->news_categories()->attach($newsCategory4);
//        $news1->news_categories()->attach($newsCategory5);
//        $news1->news_categories()->attach($newsCategory6);
//        $news1->news_categories()->attach($newsCategory7);
//
//        $news2->news_categories()->attach($newsCategory1);
//        $news2->news_categories()->attach($newsCategory2);
//        $news2->news_categories()->attach($newsCategory3);
//        $news2->news_categories()->attach($newsCategory4);
//        $news2->news_categories()->attach($newsCategory5);
//        $news2->news_categories()->attach($newsCategory6);
//
//        $news3->news_categories()->attach($newsCategory1);
//        $news3->news_categories()->attach($newsCategory2);
//        $news3->news_categories()->attach($newsCategory3);
//        $news3->news_categories()->attach($newsCategory4);
//        $news3->news_categories()->attach($newsCategory5);
//
//        $news4->news_categories()->attach($newsCategory1);
    }
}