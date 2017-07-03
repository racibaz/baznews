<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Repositories\TagRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class TagController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'tag.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->paginate();
        return Theme::view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(TagRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Tag $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Tag $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(TagRequest $request, Tag $record)
    {
        return $this->save($record);
    }


    public function destroy(Tag $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();

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
