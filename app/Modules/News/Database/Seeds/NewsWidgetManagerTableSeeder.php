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
        $widget = WidgetManager::where('name','RecommendationNews')->first();
        if(empty($widget))
        {
            WidgetManager::create([
//                'widget_group_id' => 4,
                'name'          => 'RecommendationNews',
                'slug'          => str_slug('RecommendationNews'),
                'namespace'     => '\App\Modules\News\Widgets\RecommendationNews',
                'group'         => 'right_bar',
                'position'      => 1,
                'is_active'     => 1
            ]);
        }
    }
}
