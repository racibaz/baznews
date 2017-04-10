<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 10.04.2017
 * Time: 11:20
 */

namespace App\Library\Link;


use Mremi\UrlShortener\Model\Link;
use Mremi\UrlShortener\Provider\Google\GoogleProvider;
use Illuminate\Support\Facades\Cache;

class LinkShortener
{
    private $link;
    function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function linkShortener($slug) : string
    {
        return $this->linkShortenerByGoogle($slug);
    }


    public function linkShortenerByGoogle($slug) : string
    {
        $this->link->setLongUrl(Cache::tags(['Setting'])->get('url') . '/' . $slug);

        $googleProvider = new GoogleProvider(
            Cache::tags(['Setting'])->get('google_url_shortener_key'),
            array('connect_timeout' => 1, 'timeout' => 1)
        );

        return  $googleProvider->shorten($this->link);
    }

}