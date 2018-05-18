<?php

namespace App\Modules\Article\Widgets;

use App\Modules\Article\Repositories\ArticleRepository;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Cache;

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
        $recentArticles = Cache::tags(['Widget', 'Article', 'recentArticles'])->rememberForever('recentArticles', function () {

            $repo = new ArticleRepository();
            return $repo->with(['article_categories', 'article_authors'])
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->take(Cache::tags('Setting')->get('recent_article_widget_list_count'))
                ->orderBy('order', 'desc')
                ->get();
        });

        return view('article::frontend.widgets.recent_articles', compact(['recentArticles']));
    }
}