<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\AdvertisementRequest;
use App\Models\Advertisement;
use App\Repositories\AdvertisementRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class AdvertisementController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'advertisement.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $repo = $this->repo;
        $records = $this->repo->orderBy('created_at','desc')->findAll();
        $advertisementAreaNames = $this->getThemeAdvertisementAreaName();
        $activeTheme = Theme::getCurrent();

        return view($this->getViewName(__FUNCTION__), compact(
            'records',
            'advertisementAreaNames',
            'activeTheme',
            'repo'
        ));
    }


    public function create()
    {
        $advertisementList = [];
        $repo = $this->repo;
        $advertisementAreaNames = $this->getThemeAdvertisementAreaName();

        foreach ($advertisementAreaNames as $index => $advertisementAreaName) {
            if (!in_array($advertisementAreaName['areaName'], $this->repo->advertisements()->pluck('name')->toArray())) {
                $advertisementList[$advertisementAreaName['areaName']] = $advertisementAreaName['areaName'];
            }
        }

        $record = $this->repo->createModel();

        return view($this->getViewName(__FUNCTION__), compact([
            'record',
            'advertisementAreaNames',
            'advertisementList',
            'repo'
        ]));
    }


    public function store(AdvertisementRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Advertisement $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    /**
     * todo logic seviyede geliştirilebilinir.
     * $advertisementList dizisine sadece mevcut değeri ekliyoruz.
     * Sebebi ise değiştirilmek istendiğinde model silinsin istenirse tekrar eklensin koşulunu sağlamak için.
     * Edit kısmında listeden farklı isim eklediğimiz de logic düzeyde hatalar oluşabilmekte.
     *
     *
     * @param Advertisement $record
     * @return \View
     */
    public function edit(Advertisement $record)
    {
        $advertisementList = [];
        $repo = $this->repo;

        $advertisementList[$record->name] = $record->name;

        return view($this->getViewName(__FUNCTION__), compact([
            'record',
            'advertisementList',
            'repo'
        ]));
    }


    public function update(AdvertisementRequest $request, Advertisement $record)
    {
        return $this->save($record);
    }


    public function destroy(Advertisement $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['Setting', 'Advertisement']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {

            $this->removeCacheTags(['Setting', 'Advertisement']);
            $this->removeHomePageCache();

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }

    // advertisement types https://support.google.com/adsense/answer/6002621?hl=en
    protected function getThemeAdvertisementAreaName()
    {
        $areaNames = [];

        $activeThemeJsonFilePath = base_path('public/themes/' . Theme::getCurrent() . '/theme.json');

        $jsonFile = file_get_contents($activeThemeJsonFilePath);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($jsonFile, true)),
            RecursiveIteratorIterator::SELF_FIRST);

        foreach ($jsonIterator as $key => $val) {
            if ('advertisements' == $key) {

                foreach ($val as $k => $v) {

                    if (!empty($v['areaName'])) {

                        $areaNames[$k]['areaName'] = $v['areaName'];
                        $areaNames[$k]['areaType'] = $v['areaType'];
                    }
                }

            }
        }

        return $areaNames;
    }

}
