<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Theme;
use Illuminate\Support\Facades\Redis;


class AccuWeatherWidget extends AbstractWidget
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
        return Cache::remember('accuWeatherWidget', 60, function()  {
            $weatherEmbedCode = Redis::get('weather_embed_code');
            return Theme::view('frontend.widgets.accu_weather_widget',compact([
                'weatherEmbedCode'
            ]))->render();
        });
    }
}