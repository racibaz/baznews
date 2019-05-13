<?php

namespace App\Modules\Article\Widgets;

use App\Modules\Article\Repositories\ArticleAuthorRepository;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Cache;

class ArticleAuthors extends AbstractWidget
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
        $articleAuthors = Cache::tags(['Widget', 'Article', 'articleAuthorsWidget'])->rememberForever('articleAuthorsWidget', function () {

            $repo = new ArticleAuthorRepository();
            return $repo->with(['articles'])
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->take(Cache::tags('Setting')->get('article_authors_widget_list_count'))
                ->orderBy('updated_at', 'desc')
                ->get();
        });
        return view('article::frontend.widgets.article_authors', compact(['articleAuthors']));
    }
}