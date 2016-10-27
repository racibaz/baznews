<?php

namespace App\Modules\News\Widgets;

use App\Modules\News\Repositories\RecommendationNewsRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

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
        $recommendationNewsItems = Cache::remember('recommendationNewsItems', 10, function()  {

            $recommendationNewsRepository = new RecommendationNewsRepository();
            return  $recommendationNewsRepository->with(['news'])
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->take(Redis::get('recommendation_news'))
                ->orderBy('order','desc')
                ->get();

        });

        return Theme::view('frontend.widgets.recommendation_news', compact(['config','recommendationNewsItems']));

//        return view("widgets.recommendation_news", [
//            'config' => $this->config,
//        ]);
    }
}