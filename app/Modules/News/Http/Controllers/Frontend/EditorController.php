<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\News\Repositories\NewsRepository as NewsRepo;
use App\Repositories\UserRepository as Repo;
use Cache;
use Theme;

class EditorController extends Controller
{
    public function __construct(Repo $repo, NewsRepo $newsRepo)
    {
        $this->repo = $repo;
        $this->newsRepo = $newsRepo;
    }

    public function showProfile($slug)
    {
        return Cache::tags(['UserController', 'NewsController', 'User', 'News'])->rememberForever(request()->fullUrl(), function () use ($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');

            $user = $this->repo->getUserBySlug($slug);
            $newsItems = $this->newsRepo->getNewsOfUserById($user->id);
            $userAvatar = User::getUserAvatar($user->email, 100);

            return Theme::view('news::frontend.editor.editor_news', compact([
                'user',
                'newsItems',
                'userAvatar'
            ]))->render();
        });
    }
}
