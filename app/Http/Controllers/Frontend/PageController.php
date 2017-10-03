<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository as Repo;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        return Cache::tags(['PageController', 'Page', 'page'])->rememberForever('page:' . $slug, function () use ($slug) {

            $slug = removeHtmlTagsOfField($slug);

            try{
                $record = $this->repo
                    ->where('is_active', 1)
                    ->findBy('slug', $slug);

            }catch(\Exception $e){
                abort(404);
            }

            return view('frontend.page.show', compact([
                'record'
            ]))->render();
        });
    }

}
