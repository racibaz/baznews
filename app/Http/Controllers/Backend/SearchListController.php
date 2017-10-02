<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SearchListRequest;
use App\Models\SearchList;
use App\Repositories\SearchListRepository as Repo;
use Caffeinated\Modules\Facades\Module;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SearchListController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'search_list.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('module_slug','asc')->paginate();
        return view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $moduleSlugs = [];
        foreach (Module::slugs() as $slug){

            $moduleSlugs[$slug] =  $slug;
            $moduleSlugs[$slug] =  $slug;
        }

        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact([
            'record',
            'moduleSlugs'
        ]));
    }


    public function store(SearchListRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(SearchList $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(SearchList $record)
    {
        $moduleSlugs = [];
        foreach (Module::slugs() as $slug){

            $moduleSlugs[$slug] =  $slug;
            $moduleSlugs[$slug] =  $slug;
        }

        return view($this->getViewName(__FUNCTION__), compact([
            'record',
            'moduleSlugs'
        ]));
    }


    public function update(SearchListRequest $request, SearchList $record)
    {
        return $this->save($record);
    }


    public function destroy(SearchList $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_require_slug'] = Input::get('is_require_slug') == "on" ? true : false;
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        if (isset($record->id)) {
            $result = $this->repo->update($record->id, $input);
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
