<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Repositories\NewsRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ArchiveController extends Controller
{

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return Cache::remember('archive-page', 100, function() {

            $newsCategoryList = NewsCategory::newsCategoryList();

            return Theme::view('news::frontend.archive',compact(['newsCategoryList']))->render();
        });
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
