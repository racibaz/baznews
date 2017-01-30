<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Modules\News\Repositories\NewsRepository;
use Cache;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as Repo;
use Theme;

class EditorController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function showProfile($slug)
    {
        return Cache::remember('editor:'.$slug, 100, function() use($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');


            $user = $this->repo
                    ->where('slug',$slug)
                    ->where('is_active', 1)
                    ->where('status', 1)
                    ->first();


            $newsRepo = new NewsRepository();
            $newsItems =  $newsRepo
                            ->where('user_id',$user->id)
                            ->where('is_active', 1)
                            ->where('status', 1)
                            ->findAll()
                            ->take(20);


            return Theme::view('news::frontend.editor.editor_news', compact([
                'user',
                'newsItems'
            ]))->render();
        });
    }
}
