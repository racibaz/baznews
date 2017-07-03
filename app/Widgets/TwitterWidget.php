<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
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
        return Cache::tags(['Widget', 'Core', 'TwitterWidget'])->rememberForever('TwitterWidget', function () {
            $twitterEmbedCode = Cache::get('twitter_embed_code');
            return Theme::view('frontend.widgets.twitter_widget', compact([
                'config',
                'twitterEmbedCode'
            ]))->render();
        });
    }
}