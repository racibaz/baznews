<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository;
use App\Repositories\UserRepository;
use Caffeinated\Themes\Facades\Theme;
use Redirect;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //TODO https://www.codecourse.com/lessons/laravel-scout/1050
    public function index(Request $request)
    {
        $search = $request->q;
        $records = News::search($request->q)
            ->where('is_active', 1)
            ->paginate(15);

        return Theme::view('news::frontend.news.search', compact([
            'records',
            'search'
        ]));
    }


    public function editorProfile($name, $id)
    {
        if (empty($id) || !is_numeric($id)) {
            return Redirect::back();
        }

        $userRepo = new UserRepository();
        $user = $userRepo->find($id);

        $newsRepo = new NewsRepository();
        $userNews = $newsRepo->where('user_id', $user->id)->findAll();

        return Theme::view($this->getViewName(__FUNCTION__), compact([
            'records',
            'user',
        ]));
    }


}
