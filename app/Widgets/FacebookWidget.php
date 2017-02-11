<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;

class FacebookWidget extends AbstractWidget
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

        return Theme::view('frontend.widgets.facebook_widget');

//        return Theme::view('frontend.widgets.facebook_widget',compact([
//            'embedCode'
//        ]))->render();
    }
}