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

    //todo php 7.1 method return type larına uygun olmalı
    public function linkShortener($slug)
    {
        return $this->linkShortenerByGoogle($slug);
    }


    //todo php 7.1 method return type larına uygun olmalı
    public function linkShortenerByGoogle($slug)
    {
        $this->link->setLongUrl(Cache::tags(['Setting'])->get('url') . '/' . $slug);

        $googleProvider = new GoogleProvider(
            Cache::tags(['Setting'])->get('google_url_shortener_key'),
            array('connect_timeout' => 1, 'timeout' => 1)
        );

        return  $googleProvider->shorten($this->link);
    }

}