<?php

namespace App\Modules\Book\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\Book\Models\BookSetting;
use App\Repositories\SettingRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class BookSettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'book_setting.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->findAll();
        return Theme::view('book::' . $this->getViewName(__FUNCTION__), compact(['records',]));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function save($record)
    {
        $input = Input::all();

        $v = BookSetting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if (!empty($input['book_count'])) {
            $record = $this->repo->findBy('attribute_key', 'book_count');
            $this->repo->update($record->id, ['attribute_value' => $input['book_count']]);
        }

        $this->removeCacheTags(['Book']);
        $this->removeHomePageCache();

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }

}
