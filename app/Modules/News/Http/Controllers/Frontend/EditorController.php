<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\News\Repositories\NewsRepository as NewsRepo;
use App\Repositories\UserRepository as Repo;
use Cache;

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

            $slug = removeHtmlTagsOfField($slug);

            $user = $this->repo->getUserBySlug($slug);
            $newsItems = $this->newsRepo->getNewsOfUserById($user->id);
            $userAvatar = User::getUserAvatar($user->email, 100);

            return view('news::frontend.editor.editor_news', compact([
                'user',
                'newsItems',
                'userAvatar'
            ]))->render();
        });
    }
}
