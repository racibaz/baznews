<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\RecommendationNews;
use Illuminate\Database\Seeder;

class RecommendationNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecommendationNews::create([
            'user_id'               => 1,
            'news_id'               => 1,
            'is_active'             => 1,
        ]);

        RecommendationNews::create([
            'user_id'               => 2,
            'news_id'               => 2,
            'is_active'             => 1,
        ]);

        RecommendationNews::create([
            'user_id'               => 3,
            'news_id'               => 3,
            'is_active'             => 1,
        ]);

        RecommendationNews::create([
            'user_id'               => 1,
            'news_id'               => 2,
            'is_active'             => 1,
        ]);
    }
}
