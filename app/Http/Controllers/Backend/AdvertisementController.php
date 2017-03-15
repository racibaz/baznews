<?php

namespace App\Http\Controllers\Backend;

use App\Models\Advertisement;
use App\Repositories\AdvertisementRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AdvertisementController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'advertisement.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    public function index()
    {
        $records = $this->repo->findAll();
        $advertisementAreaNames = $this->getThemeAdvertisementAreaName();
        $activeTheme = Theme::getActive();

        return Theme::view($this->getViewName(__FUNCTION__),compact(
           'records',
            'advertisementAreaNames',
            'activeTheme'
        ));
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

        $rules = [
            'name'                          => isset($record->id)  ? 'required|max:255' : 'required|max:255|unique:advertisements',
            'description'                   => 'max:255',
        ];

        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
            }

            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
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
