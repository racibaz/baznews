<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\FutureNews;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FutureNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $news1 = News::find(1)->first();
//        $news2 = News::find(2)->first();
//        $news3 = News::find(3)->first();
//        $news4 = News::find(4)->first();
//
//        $news1->future_news()->attach(new FutureNews());

        FutureNews::create([
            'news_id' => 1,
            'future_datetime' => Carbon::now()->addMinutes(3),
            'is_active' => 1
        ]);

        FutureNews::create([
            'news_id' => 2,
            'future_datetime' => Carbon::now()->addMinutes(4),
            'is_active' => 1
        ]);

        FutureNews::create([
            'news_id' => 3,
            'future_datetime' => Carbon::now()->addMinutes(5),
            'is_active' => 1
        ]);

        FutureNews::create([
            'news_id' => 4,
            'future_datetime' => Carbon::now()->addMinutes(6),
            'is_active' => 1
        ]);

    }
}
