<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Repositories\AdvertisementRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AdvertisementController extends Controller
{
    private $repo;
    private $view = 'advertisement.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->middleware(function ($request, $next) {

            $this->permisson_check();

            return $next($request);
        });

        $this->repo= $repo;
    }
    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $advertisementAreaNames = $this->getThemeAdvertisementAreaName();

        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact([
            'record',
            'advertisementAreaNames'
        ]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Advertisement $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Advertisement $record)
    {
        $advertisementAreaNames = $this->getThemeAdvertisementAreaName();

        return Theme::view($this->getViewName(__FUNCTION__),compact([
            'record',
            'advertisementAreaNames'
        ]));
    }


    public function update(Request $request, Advertisement $record)
    {
        return $this->save($record);
    }


    public function destroy(Advertisement $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        $v = Advertisement::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    // advertisement types https://support.google.com/adsense/answer/6002621?hl=en
    protected function getThemeAdvertisementAreaName()
    {
        $areaNames = [];

        $activeThemeJsonFilePath = base_path('public/themes/' . Theme::getActive() . '/theme.json');

        $jsonFile = file_get_contents($activeThemeJsonFilePath);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($jsonFile, true)),
            RecursiveIteratorIterator::SELF_FIRST);

        foreach ($jsonIterator as $key => $val)
        {
            if('advertisements' == $key) {

                foreach ($val as $k => $v) {

                    if(!empty($v['areaName'])){

                        $areaNames[$k]['areaName'] = $v['areaName'];
                        $areaNames[$k]['areaType'] = $v['areaType'];
                    }
                }

            }
        }

        return $areaNames;
    }

}
