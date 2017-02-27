<?php

namespace App\Modules\News\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Theme;

class NewsArchive extends AbstractWidget
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
        return Theme::view('news::frontend.widgets.news_archive',compact([
            'config',
            'boxCuffNewsItmes'
        ]))->render();
    }
}