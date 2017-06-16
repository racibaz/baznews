<?php

namespace App\Modules\Biography\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class RssController extends Controller
{
    public $repo;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function biographiesRssRender()
    {
        $feed = Cache::tags(['RssController', 'Biography', 'biographiesRssRender'])->rememberForever('biographiesRssRender', function() {

            // create new feed
            $feed = App::make("feed");

            // creating rss feed with our most recent 20 posts
            $items = $this->repo->getLastBiographies(20);

            // set your feed's title, description, link, pubdate and language
            $feed->title = Cache::tags(['Setting'])->get('title');
            $feed->description = Cache::tags(['Setting'])->get('description');
            $feed->logo = asset('img/logo.jpg');
            $feed->link = route('rss/biographies');
            $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
            $feed->pubdate = $items[0]->updated_at;
            $feed->lang = Cache::tags(['Setting'])->get('language_code');
            $feed->setShortening(true); // true or false
            $feed->setTextLimit(100); // maximum length of description text

            foreach ($items as $item) {

                $enclosure = [
                    'url'=> asset('images/biographies/' . $item->id . '/original/' .$item->thumbnail),
                    'type'=>'image/jpeg'
                ];

                // set item's title, author, url, pubdate, description, content, enclosure (optional)*
                $feed->add(
                    $item->name,
                    '',
                    route('biography', ['slug' => $item->slug]),
                    $item->created_at,
                    $item->description,
                    $item->content,
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
}
