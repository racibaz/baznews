<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
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
        return Cache::tags(['Widget', 'Core', 'PinterestWidget'])->rememberForever('PinterestWidget', function () {
            $pinterestEmbedCode = Cache::get('pinterest_embed_code');
            return view('frontend.widgets.pinterest_widget', compact([
                'pinterestEmbedCode'
            ]))->render();
        });
    }
}