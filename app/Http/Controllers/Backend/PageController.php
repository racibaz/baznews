<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SavePage;
use App\Models\Page;
use App\Repositories\PageRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class PageController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'page.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index()
    {
        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Page $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Page $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function update(Request $request, Page $record)
    {
        return $this->save($record);
    }


    public function destroy(Page $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['Page']);
        $this->removeHomePageCache();

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;
        $input['is_comment'] = Input::get('is_comment') == "on" ? true : false;

        $rules = array(
            'name' => 'required',
            'slug' => [
                'required',
                Rule::unique('pages')->ignore($record->id),
            ],
            'description' => 'string|max:255',
            'keywords' => 'string|max:255',
        );
        $v = Validator::make($input, $rules);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id, $input);
            } else {
                $result = $this->repo->create($input);
            }

            if ($result) {

                $this->removeCacheTags(['Page']);
                $this->removeHomePageCache();

                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
