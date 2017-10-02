<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Repositories\NewsRepository;
use App\Repositories\UserRepository;
use Redirect;

class SearchController extends Controller
{
    public function editorProfile($name, $id)
    {
        if (empty($id) || !is_numeric($id)) {
            return Redirect::back();
        }

        $userRepo = new UserRepository();
        $user = $userRepo->find($id);

        $newsRepo = new NewsRepository();
        $userNews = $newsRepo->where('user_id', $user->id)->findAll();

        return view($this->getViewName(__FUNCTION__), compact([
            'records',
            'user',
        ]));
    }


}
