<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Repositories\GroupRepository as Repo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

class GroupController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'group.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }


    public function index()
    {
        $records = $this->repo->orderBy('created_at','desc')->paginate();
        return view($this->getViewName(__FUNCTION__), compact('records'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function store(GroupRequest $request)
    {
        return $this->save($this->repo->createModel());
    }


    public function show(Group $record)
    {
        return view($this->getViewName(__FUNCTION__), compact('record'));
    }


    public function edit(Group $record)
    {
        return view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(GroupRequest $request, Group $record)
    {
        return $this->save($record);
    }


    public function destroy(Group $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view . 'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $rules = array(
            'name' => [
                'required',
                'max:255',
                Rule::unique('groups')->ignore($record->id),
            ],
            'description' => 'max:255',
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
