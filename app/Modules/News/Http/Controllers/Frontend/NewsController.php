<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    private $repo;
    private $view = 'news.';
    private $redirectViewName = 'frontend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);
        return Cache::tags(['NewsController', 'News', 'news'])->rememberForever('news:' . $id, function () use ($id) {

            try{

                $previousNews = null;
                $nextNews = null;
                $record = $this->repo
                    ->with([
                        'news_categories',
                        'photo_galleries',
                        'video_galleries',
                        'photos',
                        'videos',
                        'related_news',
                        'country',
                        'city',
                        'news_source',
                        'tags',
                        'user'
                    ])
                    ->where('is_active', 1)
                    ->findBy('id', $id);


                if ($record->is_show_previous_and_next_news) {

                    $previousNews = $this->repo->previousNews($record);

                    if (empty($previousNews))
                        $previousNews = $this->repo->lastRecord($record);

                    $nextNews = $this->repo->nextNews($record);

                    if (empty($nextNews))
                        $nextNews = $this->repo->firstRecord();
                }

                if ($record->is_show_editor_profile) {
                    $userAvatar = User::getUserAvatar($record->user->email, 100);
                }

                $relatedNewsItems = $this->repo->relatedNews($record);

            }catch (\Exception $e){
                abort(404);
            }

            return view('news::frontend.news.show', compact([
                'record',
                'previousNews',
                'nextNews',
                'userAvatar',
                'relatedNewsItems',
            ]))->render();
        });
    }
}
