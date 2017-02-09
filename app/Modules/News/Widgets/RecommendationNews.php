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
     * The number of seconds before each reload.
     *
     * @var int|float
     */
    public $reloadTimeout = 10;


    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return Cache::remember('recommendationNewsItems', 10, function()  {
            $reComNewsRepo = new RecommendationNewsRepository();
            $recommendationNewsItems = $reComNewsRepo->with(['news'])
                                    ->where('is_active', 1)
                                    ->where('is_cuff', 1)
                                    ->take(Redis::get('recommendation_news'))
                                    ->orderBy('order','asc')
                                    ->get();

            return Theme::view('news::frontend.widgets.recommendation_news',compact([
                'config',
                'recommendationNewsItems'
            ]))->render();
        });
    }
}