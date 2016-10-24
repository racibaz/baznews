<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class RecommendationNews extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        $recommendationNewsItems = Cache::remember('recommendationNewsItems', 10, function() {

            return  \App\Modules\News\Models\RecommendationNews::with('news')
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->orderBy('order','asc')
                ->take(5)
                ->get();
        });



        return Theme::view('frontend.widgets.recommendation_news', compact(['config','recommendationNewsItems']));

//        return view("widgets.recommendation_news", [
//            'config' => $this->config,
//        ]);
    }
}