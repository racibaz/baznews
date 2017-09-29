<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;

class FacebookWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * The number of minutes before cache expires.
     * False means no caching at all.
     *
     * @var int|float|bool
     */
    public $cacheTime = 60;

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        return Cache::tags(['Widget', 'Core', 'FacebookWidget'])->rememberForever('FacebookWidget', function () {
            $facebookEmbedCode = Cache::get('facebook_embed_code');
            return view('frontend.widgets.facebook_widget', compact([
                'facebookEmbedCode'
            ]))->render();
        });
    }
}