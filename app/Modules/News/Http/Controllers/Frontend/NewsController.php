<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\News;
use App\Modules\News\Models\RelatedNews;
use App\Modules\News\Repositories\NewsCategoryRepository;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
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


    public function index()
    {
        $records = $this->repo->orderBy('updated_at', 'desc')->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records']));
    }


    public function getNewsBySlug($slug)
    {
        return Cache::remember('news:'.$slug, 100, function() use($slug) {

            $slug = htmlentities(strip_tags($slug), ENT_QUOTES, 'UTF-8');
            $record = $this->repo->where('status', 1)->findBy('slug',$slug);

            return Theme::view('news::frontend.news.getNewsBySlug', compact(['record']))->render();
        });

    }


    public function show($newsSlug)
    {
        $newsId =  substr(strrchr($newsSlug, '-'), 1 );

        return Cache::remember('news:'.$newsId, 100, function() use($newsId) {

            $previousNews = null;
            $nextNews = null;
            $relatedNews = [];
            //$newsSlug = htmlentities(strip_tags($newsSlug), ENT_QUOTES, 'UTF-8');
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
                                ->where('status', 1)
                                ->where('is_active', 1)
                                ->findBy('id',$newsId);

            if($record->is_show_previous_and_next_news){

                $previousNewsID = $this->repo
                    ->where('id', '<', $record->id)
                    ->where('status',1)
                    ->where('is_active',1)
                    ->max('id');

                //todo $previousNews = $this->repo->find($previousNewsID);
                /*
                 * formatında null değeri veriyor.
                 *
                 * $previousNews = $this->repo->where('id',$previousNewsID)->first();
                   $previousNews = News::where('id',$previousNewsID)->first();
                 *
                 * farkı nedir bakılacak...
                 * */
                //$previousNews = $this->repo->where('id',$previousNewsID)->first();
                $previousNews = News::where('id',$previousNewsID)->first();

                $nextNewsID = $this->repo
                    ->where('id', '>', $record->id)
                    ->where('status',1)
                    ->where('is_active',1)
                    ->min('id');

                //$nextNews = $this->repo->where('id',$nextNewsID)->first();
                $nextNews = News::where('id',$nextNewsID)->first();
            }



            foreach ($record->related_news as $index => $related_news) {
                array_push($relatedNews,$related_news->related_news_id);
            }

            $relatedNewsItems =  $this->repo->whereIn('id', $relatedNews)->findAll();

            return Theme::view('news::frontend.news.show', compact([
                'record',
                'previousNews',
                'nextNews',
                'relatedNewsItems',
            ]))->render();
        });
    }


}
