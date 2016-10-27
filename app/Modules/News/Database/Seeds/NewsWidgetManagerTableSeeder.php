<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\WidgetManager;
use Illuminate\Database\Seeder;

class NewsWidgetManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WidgetManager::create([
            'name'          => 'RecommendationNews',
            'slug'          => 'recommandation_news',
            'namespace'     => '\App\Modules\News\Widgets\RecommendationNews',
            'position'      => 1,
            'group'         => 'rightbar',
            'is_active'     => 1
        ]);
    }
}
