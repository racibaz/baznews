<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Modules\News\Repositories\VideoRepository;
use Illuminate\Support\Facades\Cache;

class RssController extends Controller
{
    public $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function bandNewsRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'bandNewsRssRender'])->rememberForever('bandNewsRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getBandNewsItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/band_news');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function boxCuffRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'boxCuffRssRender'])->rememberForever('boxCuffRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getBoxCuffNewsItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/box_cuff');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function breakNewsRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'breakNewsRssRender'])->rememberForever('breakNewsRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getBreakNewsItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/break_news');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function mainCuffRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'mainCuffRssRender'])->rememberForever('mainCuffRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getMainCuffItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/main_cuff');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function miniCuffRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'miniCuffRssRender'])->rememberForever('miniCuffRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getMiniCuffItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/mini_cuff');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function allNewsRssRender()
    {
        $feed = Cache::tags(['RssController', 'News', 'allNewsRssRender'])->rememberForever('allNewsRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $newsItems = $this->repo->getBandNewsItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/all_news');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $newsItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($newsItems as $newsItem) {

                $enclosure = [
                    'url'=> asset('images/news_images/' . $newsItem->id . '/thumbnail/' .$newsItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $newsItem->title,
                    $newsItem->is_show_editor_profile ? $newsItem->user->name : '', //editor isminin görünmesi istemiyor ise boş değer veriyoruz.
                    route('show_news', ['slug' => $newsItem->slug]),
                    $newsItem->created_at,
                    $newsItem->description,
                    $newsItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

    public function videosRssRender(VideoRepository $repo)
    {
        $feed = Cache::tags(['RssController', 'News', 'videosRssRender'])->rememberForever('videosRssRender', function() use ($repo){

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $videoItems = $repo->getLastVideoItems();

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/videos');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $videoItems[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($videoItems as $videoItem) {

                $enclosure = [
                    'url'=> asset('videos/' . $videoItem->id . '/' .$videoItem->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $videoItem->name,
                     '',
                    route('show_videos', ['slug' => $videoItem->slug]),
                    $videoItem->created_at,
                    $videoItem->content,
                    $videoItem->content,
                    $enclosure
                );
            }

            return $feed;
        });


        // first param is the feed format
        // optional: second param is cache duration (value of 0 turns off caching)
        // optional: you can set custom cache key with 3rd param as string
        // to return your feed as a string set second param to -1
        // $xml = $feed->render('atom', -1);

        return $feed->render('atom');
    }

//    public function getNewsCategoryRssRender($categoryName)
//    {
//
//        $this->repo = new NewsCategoryrepo();
//
//        $categoryName = strip_tags($categoryName);
//        $categoryName = htmlspecialchars($categoryName);
//        $categoryName = trim($categoryName);
//
//
//        // create new feed
//        $feed = App::make("feed");
//
//        // multiple feeds are supported
//        // if you are using caching you should set different cache keys for your feeds
//
//        // cache the feed for 60 minutes (second parameter is optional)
//        $feed->setCache(60, $categoryName);
//
//        // check if there is cached feed and build new only if is not
//        if (!$feed->isCached()) {
//            // creating rss feed with our most recent 20 posts
//            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();
//
//            $newsCategory = $this->repo->where('is_active', 1)->where('name', $categoryName)->orderBy('created_at', 'desc')->take(20)->first();
//
//
//            if(empty($newsCategory) || !isset($newsCategory) ){
//                return "hata-boş 404";
//            }
//
//            $newsItems = $newsCategory->news;
//
//
//            // set your feed's title, description, link, pubdate and language
//            $feed->title = Redis::get('title');
//            $feed->description = Redis::get('description');
//            $feed->logo = asset(Redis::get('logo'));
//            $feed->link = url('feed');
//            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
//            $feed->pubdate = $newsItems[0]->created_at;
//            $feed->lang = Redis::get('language_code');
//            $feed->setShortening(true); // true or false
//            $feed->setTextLimit(100); // maximum length of description text
//
//            foreach ($newsItems as $newsItem) {
//                $enclosure = [
//                    'url' => Redis::get('url') . '/' . $newsItem->thumbnail,
//                    'type' => 'image/jpeg'
//                ];
//
//                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
//                $feed->add(
//                    $newsItem->title,
//                    'yazar',
//                    URL::to($newsItem->slug),
//                    $newsItem->created_at,
//                    $newsItem->description,
//                    $newsItem->content,
//                    $enclosure
//                );
//            }
//
//            // first param is the feed format
//            // optional: second param is cache duration (value of 0 turns off caching)
//            // optional: you can set custom cache key with 3rd param as string
//            return $feed->render('atom');
//
//            // to return your feed as a string set second param to -1
//            // $xml = $feed->render('atom', -1);
//        }
//    }
}
