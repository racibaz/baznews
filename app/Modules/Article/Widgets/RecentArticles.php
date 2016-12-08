<?php

namespace App\Modules\Article\Widgets;

use App\Modules\Article\Repositories\ArticleRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class RecentArticles extends AbstractWidget
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
        $recentArticles = Cache::remember('recentArticles', 10, function()  {

            $articleRepository = new ArticleRepository();
            return  $articleRepository->with(['article_categories', 'authors'])
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->where('status', 1)
                ->take(Redis::get('recommendation_news'))
                ->orderBy('order','desc')
                ->get();
        });

        return Theme::view('article::frontend.widgets.recent_articles', compact(['recentArticles']));
    }
}