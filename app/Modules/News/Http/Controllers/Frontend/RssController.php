<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Models\Video;
use App\Modules\News\Repositories\NewsCategoryRepository;
use App\Modules\News\Repositories\NewsRepository;
use App\Modules\News\Repositories\VideoRepository;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\URL;

class RssController extends Controller
{

    public $repository;

    public function __construct()
    {
        $this->repository = new NewsRepository();
    }

    public function bandNewsRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'bandNewsRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsItems = $this->repository->where('break_news', 1)->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem)
            {
                $enclosure = [
                    'url'=> Redis::get('url') . '/' . $newsItem->thumbnail,
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    'yazar',
                    URL::to($newsItem->slug),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
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

    public function boxCuffRssRender()
{
    // create new feed
    $feed = App::make("feed");

    // multiple feeds are supported
    // if you are using caching you should set different cache keys for your feeds

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(60, 'boxCuffRssRender');

    // check if there is cached feed and build new only if is not
    if (!$feed->isCached())
    {
        // creating rss feed with our most recent 20 posts
        //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

        $newsItems = $this->repository->where('box_cuff', 1)->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();

        // set your feed's title, description, link, pubdate and language
        $feed->title = Redis::get('title');
        $feed->description = Redis::get('description');
        $feed->logo = asset(Redis::get('logo'));
        $feed->link = url('feed');
        $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
        $feed->pubdate = $newsItems[0]->created_at;
        $feed->lang = Redis::get('language_code');
        $feed->setShortening(true); // true or false
        $feed->setTextLimit(100); // maximum length of description text

        foreach ($newsItems as $newsItem)
        {
            // set item's title, author, url, pubdate, description, content, enclosure (optional)*
            $feed->add($newsItem->title, 'yazar', URL::to($newsItem->slug), $newsItem->created_at, $newsItem->description, $newsItem->content);
        }

    }

    // first param is the feed format
    // optional: second param is cache duration (value of 0 turns off caching)
    // optional: you can set custom cache key with 3rd param as string
    return $feed->render('atom');

    // to return your feed as a string set second param to -1
    // $xml = $feed->render('atom', -1);

}

    public function breakNewsRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'breaknewsRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsItems = $this->repository->where('break_news', 1)->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($newsItem->title, 'yazar', URL::to($newsItem->slug), $newsItem->created_at, $newsItem->description, $newsItem->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    public function mainCuffRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'bandNewsRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsItems = $this->repository->where('main_cuff', 1)->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();


            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($newsItem->title, 'yazar', URL::to($newsItem->slug), $newsItem->created_at, $newsItem->description, $newsItem->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    public function miniCuffRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'bandNewsRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsItems = $this->repository->where('mini_cuff', 1)->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();


            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($newsItem->title, 'yazar', URL::to($newsItem->slug), $newsItem->created_at, $newsItem->description, $newsItem->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    public function allNewsRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'bandNewsRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsItems = $this->repository->where('status', 1)->orderBy('created_at', 'desc')->take(20)->get();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add($newsItem->title, 'yazar', URL::to($newsItem->slug), $newsItem->created_at, $newsItem->description, $newsItem->content);
            }

        }

        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        return $feed->render('atom');

        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);
    }

    public function videosRssRender()
    {

        $this->repository = new VideoRepository();

        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'videosRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $records = $this->repository->where('is_active',1)->orderBy('created_at', 'desc')->take(20)->get();


            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $records[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($records as $record)
            {
                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $record->name,
                    'author',
                    URL::to($record->slug),
                    $record->created_at,
                    $record->description,
                    $record->description
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

    public function getNewsCategoryRssRender($categoryName)
    {

        $this->repository = new NewsCategoryRepository();

        $categoryName = strip_tags($categoryName);
        $categoryName = htmlspecialchars($categoryName);
        $categoryName = trim($categoryName);


        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, $categoryName);

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached()) {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $newsCategory = $this->repository->where('is_active', 1)->where('name', $categoryName)->orderBy('created_at', 'desc')->take(20)->first();


            if(empty($newsCategory) || !isset($newsCategory) ){
                return "hata-boş 404";
            }

            $newsItems = $newsCategory->news;


            // set your feed's title, description, link, pubdate and language
            $feed->title = Redis::get('title');
            $feed->description = Redis::get('description');
            $feed->logo = asset(Redis::get('logo'));
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->created_at;
            $feed->lang = Redis::get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {
                $enclosure = [
                    'url' => Redis::get('url') . '/' . $newsItem->thumbnail,
                    'type' => 'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    'yazar',
                    URL::to($newsItem->slug),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            // first param is the feed format
            // optional: second param is cache duration (value of 0 turns off caching)
            // optional: you can set custom cache key with 3rd param as string
            return $feed->render('atom');

            // to return your feed as a string set second param to -1
            // $xml = $feed->render('atom', -1);
        }
    }
}
