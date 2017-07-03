<?php

namespace App\Modules\Biography\Widgets;

use App\Modules\Biography\Repositories\BiographyRepository;
use Arrilot\Widgets\AbstractWidget;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Cache;

class Biographies extends AbstractWidget
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
        $biographies = Cache::tags(['Widget', 'Biography', 'biography'])->rememberForever('biography', function () {

            $biograpRepository = new BiographyRepository();
            return $biograpRepository
                ->where('status', 1)
                ->where('is_active', 1)
                ->where('is_cuff', 1)
//                ->take(Redis::get('biography_count'))
                ->take(10)
                ->orderBy('order', 'desc')
                ->get();

        });
        return Theme::view('biography::frontend.widgets.biographies', compact(['config', 'biographies']));
    }
}