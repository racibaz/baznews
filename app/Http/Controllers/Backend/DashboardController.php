<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    private $model;
    private $view = '.dashboard.';
    private $redirectViewName = 'backend';
    private $redirectRouteName = 'admin';

//    public function __construct(CityRepositoryInterface $model)
//    {
//        $this->model= $model;
//    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }


    public function index()
    {
        $records = User::all();

        dd($this->getViewName(__FUNCTION__));

        return view($this->getViewName(__FUNCTION__))
            ->with('records', $records);
    }


    public function create()
    {
        $record = new User();
        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function store(Request $request)
    {
        return $this->save(new User());
    }


    public function show(User $record)
    {

        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function edit(User $record)
    {
        return view($this->getViewName(__FUNCTION__))
            ->with('record', $record);
    }


    public function update(Request $request, User $record)
    {
        return $this->save($record);
    }


    public function destroy(User $record)
    {

        $record->delete();

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
                $result = $record->update($input);

            } else {
                $result = $record->create($input);
                $record = $result;
                if (isset($result)) {
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
