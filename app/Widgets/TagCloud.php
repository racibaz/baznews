<?php

namespace App\Widgets;

use App\Repositories\TagRepository;
use Arrilot\Widgets\AbstractWidget;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class TagCloud extends AbstractWidget
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
        return Cache::tags(['Widget', 'Core', 'TagCloud'])->rememberForever('TagCloud', function () {

            $tagRepo = new TagRepository();
            $tags = $tagRepo->take(5)->orderBy('updated_at', 'desc')->get();

            return Theme::view('frontend.widgets.tag_cloud', compact([
                'config',
                'tags'
            ]))->render();
        });
    }
}