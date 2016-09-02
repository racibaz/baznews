<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{

    private $model;
    private $view = '.user.';
    private $redirectViewName = 'backend';
    private $redirectRouteName = 'admin';

    public function __construct(User $model)
    {
        $this->model= $model;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = $this->model->all();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records'));
    }


    public function create()
    {
        $record = new User();
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function store(Request $request)
    {
        return $this->save(new User());
    }


    public function show(User $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(User $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function update(Request $request, User $record)
    {
        return $this->save($record);
    }


    public function destroy(User $record)
    {

        $this->model->delete($record->id);

//        $this->model->delete($record->id);
//        Session::flash('flash_message', trans('common.message_model_deleted'));
//        Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());

        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['status'] = Input::get('status') == "on" ? true : false;

        $v = User::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->model->update($input,$record->id);
            } else {
                $result = $this->model->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                //Log::info('class : ' . get_class($this) . ' function :' . __FUNCTION__ . ' Kişi : ' . Auth::user()->UserFullName() . ' Kayıt ID : ' . $record->id . ' - IP :' . Auth::user()->getUserIp());
                return Redirect::route($this->redirectRouteName . $this->view . '.index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }
}
