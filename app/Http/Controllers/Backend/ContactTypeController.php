<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ContactTypeRequest;
use App\Models\ContactType;
use App\Repositories\ContactTypeRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ContactTypeController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'contact_type.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at','desc')->paginate();
        return Theme::view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(ContactTypeRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(ContactType $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(ContactType $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(ContactTypeRequest $request, ContactType $record)
    {
        return $this->save($record);
    }


    public function destroy(ContactType $record)
    {
        $this->repo->delete($record->id);

        $this->removeCacheTags(['ContactType']);

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

            $this->removeCacheTags(['ContactType']);

            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
