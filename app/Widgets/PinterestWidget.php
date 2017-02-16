<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Theme;
use Illuminate\Support\Facades\Redis;

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
            $pinterestEmbedCode = Redis::get('pinterest_embed_code');
            return Theme::view('frontend.widgets.pinterest_widget',compact([
                'pinterestEmbedCode'
            ]))->render();
        });
    }
}