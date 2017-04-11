<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use App\Repositories\CityRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class CityController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'city.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }

    /**
     * @return \View
     */
    public function index()
    {
        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }

    /**
     * @return \View
     */
    public function create()
    {
        $countries = Country::countryList();
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'countries']));
    }


    /**
     * @param CityRequest $request
     * @return CityController|\Illuminate\Http\RedirectResponse
     */
    public function store(CityRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    /**
     * @param \App\Models\City $record
     *
     * @return \View
     */
    public function show(City $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    /**
     * @param \App\Models\City $record
     *
     * @return \View
     */
    public function edit(City $record)
    {
        $countries = Country::countryList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'countries']));
    }


    /**
     * @param CityRequest $request
     * @param City $record
     * @return CityController|\Illuminate\Http\RedirectResponse
     */
    public function update(CityRequest $request, City $record)
    {
        return $this->save($record);
    }


    /**
     * @param \App\Models\City $record
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(City $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    /**
     * @param $record
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        if (isset($record->id)) {
            $result = $this->repo->update($record->id,$input);
        } else {
            $result = $this->repo->create($input);
        }

        if ($result) {
            Session::flash('flash_message', trans('common.message_model_updated'));
            return redirect()->route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return redirect()->back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
