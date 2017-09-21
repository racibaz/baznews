<?php

namespace App\Modules\News\Widgets;

use App\Modules\News\Repositories\RecommendationNewsRepository;
use Arrilot\Widgets\AbstractWidget;
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
        return Cache::tags(['Widget', 'News', 'RecommendationNews'])->rememberForever('recommendationNewsItems', function () {
            $reComNewsRepo = new RecommendationNewsRepository();
            $recommendationNewsItems = $reComNewsRepo->getCuffRecommendationNewsItems(5);

            return view('news::frontend.widgets.recommendation_news', compact([
                'config',
                'recommendationNewsItems'
            ]))->render();
        });
    }
}