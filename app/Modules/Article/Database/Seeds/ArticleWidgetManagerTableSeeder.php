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
//                'widget_group_id' => 4,
                'name'          => 'RecentArticles',
                'slug'          => str_slug('RecentArticles'),
                'namespace'     => '\App\Modules\Article\Widgets\RecentArticles',
                'group'         => 'right_bar',
                'position'      => 3,
                'is_active'     => 1
            ]);
        }
    }
}
