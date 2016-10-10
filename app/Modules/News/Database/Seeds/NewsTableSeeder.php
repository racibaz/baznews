<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news1 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_resource_id'                  => 1,
            'title'                             => 'İlk Haber',
            'slug'                              => 'ilk_haber',
            'spot'                              => 'spot',
            'content'                           => 'ilk haber içerik',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'thumbnail'                         => 'thıbnail',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'break_news'                        => 1,
            'is_comment'                        => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                               => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news2 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_resource_id'                  => 1,
            'title'                             => 'İkinci Haber',
            'slug'                              => 'ikinci_haber',
            'spot'                              => 'spot',
            'content'                           => 'ikinci haber içerik',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'thumbnail'                         => 'thıbnail',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'break_news'                        => 1,
            'is_comment'                        => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                               => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news3 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_resource_id'                  => 1,
            'title'                             => 'Üç Haber',
            'slug'                              => 'Üç_haber',
            'spot'                              => 'spot',
            'content'                           => 'Üçü içerik',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'thumbnail'                         => 'thıbnail',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'break_news'                        => 1,
            'is_comment'                        => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                               => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news4 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_resource_id'                  => 1,
            'title'                             => 'Dört Haber',
            'slug'                              => 'Dört_haber',
            'spot'                              => 'spot',
            'content'                           => 'Dört haber içerik',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'thumbnail'                         => 'thıbnail',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'break_news'                        => 1,
            'is_comment'                        => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                               => 'koordinatlar',
            'is_active'                         => 1
        ]);


        $newsCategory1 = NewsCategory::find(1)->first();
        $newsCategory2 = NewsCategory::find(2)->first();
        $newsCategory3 = NewsCategory::find(3)->first();
        $newsCategory4 = NewsCategory::find(4)->first();
        $newsCategory5 = NewsCategory::find(5)->first();
        $newsCategory6 = NewsCategory::find(6)->first();
        $newsCategory7 = NewsCategory::find(7)->first();


        $news1->news_categories()->attach($newsCategory1);
        $news1->news_categories()->attach($newsCategory2);
        $news1->news_categories()->attach($newsCategory3);
        $news1->news_categories()->attach($newsCategory4);
        $news1->news_categories()->attach($newsCategory5);
        $news1->news_categories()->attach($newsCategory6);
        $news1->news_categories()->attach($newsCategory7);

        $news2->news_categories()->attach($newsCategory1);
        $news2->news_categories()->attach($newsCategory2);
        $news2->news_categories()->attach($newsCategory3);
        $news2->news_categories()->attach($newsCategory4);
        $news2->news_categories()->attach($newsCategory5);
        $news2->news_categories()->attach($newsCategory6);

        $news3->news_categories()->attach($newsCategory1);
        $news3->news_categories()->attach($newsCategory2);
        $news3->news_categories()->attach($newsCategory3);
        $news3->news_categories()->attach($newsCategory4);
        $news3->news_categories()->attach($newsCategory5);

        $news4->news_categories()->attach($newsCategory1);
    }
}