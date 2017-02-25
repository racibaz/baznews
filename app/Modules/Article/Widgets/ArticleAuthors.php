<?php

namespace App\Modules\Article\Widgets;

use App\Modules\Article\Repositories\ArticleAuthorRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

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
        $articleAuthors = Cache::remember('articleAuthors', 10, function()  {

            $repo = new ArticleAuthorRepository();
            return  $repo->with(['articles'])
                ->where('is_active', 1)
                ->where('is_cuff', 1)
                ->take(Redis::get('article_authors_widget_list_count'))
//                ->take(10)
                ->orderBy('updated_at','desc')
                ->get();
        });
        return Theme::view('article::frontend.widgets.article_authors', compact(['articleAuthors']));
    }
}