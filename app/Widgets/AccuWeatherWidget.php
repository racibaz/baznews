<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Cache;
use Theme;


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
        return Cache::tags(['Widget', 'Core', 'AccuWeatherWidget'])->rememberForever('AccuWeatherWidget', function () {

            $weatherEmbedCode = Cache::get('weather_embed_code');
            return view('frontend.widgets.accu_weather_widget', compact([
                'weatherEmbedCode'
            ]))->render();
        });
    }
}