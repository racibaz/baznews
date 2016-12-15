<?php

namespace App\Modules\Article\Database\Seeds;

use App\Models\WidgetManager;
use Illuminate\Database\Seeder;

class ArticleWidgetManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $widget = WidgetManager::where('name','RecentArticles')->first();
        if(empty($widget))
        {
            WidgetManager::create([
                'name'          => 'RecentArticles',
                'slug'          => 'recent_articles',
                'namespace'     => '\App\Modules\Article\Widgets\RecentArticles',
                'position'      => 3,
                'group'         => 'rightbar',
                'is_active'     => 1
            ]);
        }
    }
}
