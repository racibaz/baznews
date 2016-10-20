<?php

namespace App\Modules\Article\Http\Controllers\Frontend;

use App\Modules\Article\Models\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class RssController extends Controller
{
    public function articlesRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'articlesRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $articleItems = Article::where('status',1)->orderBy('created_at', 'desc')->take(20)->get();


            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Your title';
            $feed->description = 'Your description';
            $feed->logo = asset('/logo.jpg');
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $articleItems[0]->created_at;
            $feed->lang = 'tr';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($articleItems as $articleItem)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $articleItem->title,
                    $articleItem->author->first_name . ' '. $articleItem->author->last_name ,
                    URL::to($articleItem->slug),
                    $articleItem->created_at,
                    $articleItem->description,
                    $articleItem->content
                );
            }
        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }
}
