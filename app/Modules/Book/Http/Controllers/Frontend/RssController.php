<?php

namespace App\Modules\Book\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Book\Models\Book;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class RssController extends Controller
{
    public function booksRssRender()
    {
        // create new feed
        $feed = App::make("feed");

        // multiple feeds are supported
        // if you are using caching you should set different cache keys for your feeds

        // cache the feed for 60 minutes (second parameter is optional)
        $feed->setCache(60, 'booksRssRender');

        // check if there is cached feed and build new only if is not
        if (!$feed->isCached())
        {
            // creating rss feed with our most recent 20 posts
            //$posts = \DB::table('posts')->orderBy('created_at', 'desc')->take(20)->get();

            $bookItems = Book::where('is_active',1)->orderBy('created_at', 'desc')->take(20)->get();


            // set your feed's title, description, link, pubdate and language
            $feed->title = 'Your title';
            $feed->description = 'Your description';
            $feed->logo = asset('/logo.jpg');
            $feed->link = url('feed');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $bookItems[0]->created_at;
            $feed->lang = 'tr';
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($bookItems as $bookItem)
            {
                $enclosure = [
                    'url'=> 'http://baznews.app/' . $bookItem->thumbnail,
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $bookItem->name,
                    'author',
                    URL::to($bookItem->slug),
                    $bookItem->created_at,
                    $bookItem->description,
                    $bookItem->description,
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
}
