<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Illuminate\Support\Facades\Redis;
use Theme;

class TwitterWidget extends AbstractWidget
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
        return Cache::remember('twitterWidget', 60, function()  {
            $twitterEmbedCode = Redis::get('twitter_embed_code');
            return Theme::view('frontend.widgets.twitter_widget',compact([
                'config',
                'twitterEmbedCode'
            ]))->render();
        });
    }
}