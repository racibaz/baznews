<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Redis;
use Theme;

class PinterestWidget extends AbstractWidget
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
        return Cache::remember('piterestWidget', 60, function()  {
            $piterestEmbedCode = Redis::get('piterest_embed_code');
            return Theme::view('frontend.widgets.piterest_widget',compact([
                'config',
                'piterestEmbedCode'
            ]))->render();
        });
    }
}