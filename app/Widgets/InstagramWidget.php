<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Theme;

class InstagramWidget extends AbstractWidget
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
        return Cache::tags(['Widget', 'Core', 'InstagramWidget'])->rememberForever('InstagramWidget', function () {
            $instagramEmbedCode = Cache::get('instagram_embed_code');
            return Theme::view('frontend.widgets.instagram_widget', compact([
                'instagramEmbedCode'
            ]))->render();
        });
    }
}