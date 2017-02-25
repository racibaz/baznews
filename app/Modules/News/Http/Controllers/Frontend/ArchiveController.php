<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Modules\News\Models\News;
use App\Modules\News\Repositories\NewsRepository as Repo;
use App\Repositories\TagRepository;
use Caffeinated\Themes\Facades\Theme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ArchiveController extends Controller
{

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

//    public function index( $years = null, $months = null, $days = null, $news_category = null, Request $request)
    public function index(Request $request)
    {
        $records = [];
        $year = $request->years;
        $month = $request->months;
        $day = $request->days;

        if(!empty($year) && !empty($month) && !empty($day)){

            $datetime = $year . '-' . $month . '-' . $day;

            $records = $this->repo->where('is_active',1)
                                    ->where('status',1)
                                    ->where('updated_at','>=',$datetime . ' 00:00:00')
                                    ->where('updated_at','<=',$datetime . ' 23:59:-59')
                                    ->get();


//            $records = News::where('is_active',1)
//                            ->where('status',1)
//                            ->whereBetween('created_at', [$datetime . ' 00:00:00',$datetime . ' 23:59:-59'])
//                            ->get();
        }


        $tagRepo = new TagRepository();
        $tags = $tagRepo->orderBy('updated_at','desc')->simplePaginate(15);


        return Theme::view('news::frontend.archive',
            compact([
                'records',
                'tags',
            ]));


        /*
         * YEAR(created_at) year,
       MONTH(created_at) month,
       MONTHNAME(created_at) month_name,
         *
         *
         *
         * $posts_by_date = Post::all()->groupBy(function($date) {
    return Carbon::parse($date->created_at)->format('Y-m');
});
         *
         *
         *https://laracasts.com/discuss/channels/general-discussion/group-post-by-day
         *
         * $posts = Post::all()->groupBy(function($item){ return $item->created_at->format('d-M-y'); })->toArray();
         * */


//        return Cache::remember('archive-page', 100, function() {
//
//            $newsCategoryList = NewsCategory::newsCategoryList();
//
//            return Theme::view('news::frontend.archive',compact(['newsCategoryList']))->render();
//        });
    }

    //TODO Api ile çekilecek.
    public function getArchive(Request $request)
    {
        $input = Input::all();

        dd($input);

        if(!isset($input['days'])  ||  !isset($input['months']) || !isset($input['years'])){

            //TODO geçerli tarih değil hata mesajı
            //Güvenlik kontrolleri yapıolacak.
            return Redirect::route('archive')
                ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
        }



        $datetime = $input['years'] . '-' . $input['months'] . '-' . $input['days'] . ' 17:06:46';


        $rules = array(
            'datetime' => 'date_format:'.$datetime,
        );
        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        $records = $this->repo
            ->where('is_active', 1)
            ->where('status', 1)
            ->where('updated_at', $datetime)
            ->orderBy('updated_at', 'desc')
            ->findAll();


        return $records;
    }

}
