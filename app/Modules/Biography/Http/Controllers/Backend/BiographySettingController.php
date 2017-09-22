<?php

namespace App\Modules\Biography\Http\Controllers\Backend;


use App\Http\Controllers\Backend\BackendController;
use App\Modules\Biography\Models\BiographySetting;
use App\Repositories\SettingRepository as Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class BiographySettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'biography_setting.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->findAll();
        return view('article::' . $this->getViewName(__FUNCTION__), compact(['records',]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function save($record)
    {
        $input = Input::all();

        $v = BiographySetting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if (!empty($input['biography_count'])) {
            $record = $this->repo->findBy('attribute_key', 'biography_count');
            $this->repo->update($record->id, ['attribute_value' => $input['biography_count']]);
        }


        $this->removeCacheTags(['Biography']);
        $this->removeHomePageCache();

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }

}