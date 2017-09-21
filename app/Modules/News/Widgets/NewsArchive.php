<?php

namespace App\Modules\News\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Carbon\Carbon;

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
        $subYears = Carbon::now()->subYears(5)->year;
        $nowYear = Carbon::now()->year;

        return view('news::frontend.widgets.news_archive', compact([
            'config',
            'subYears',
            'nowYear'
        ]))->render();
    }
}