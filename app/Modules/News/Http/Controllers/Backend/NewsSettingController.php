<?php

namespace App\Modules\News\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Models\NewsSetting;
use App\Repositories\SettingRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class NewsSettingController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'news_setting.';
        $this->redirectViewName = 'backend.';
        $this->repo = $repo;
    }

    public function index()
    {
        $records = $this->repo->findAll();
        return Theme::view('news::' . $this->getViewName(__FUNCTION__), compact(['records',]));
    }

    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }

    public function save($record)
    {
        $input = Input::all();

        $v = NewsSetting::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        }

        if (!empty($input['break_news'])) {
            $record = $this->repo->findBy('attribute_key', 'break_news');
            $this->repo->update($record->id, ['attribute_value' => $input['break_news']]);
        }

        if (!empty($input['band_news'])) {
            $record = $this->repo->findBy('attribute_key', 'band_news');
            $this->repo->update($record->id, ['attribute_value' => $input['band_news']]);
        }

        if (!empty($input['break_news'])) {
            $record = $this->repo->findBy('attribute_key', 'break_news');
            $this->repo->update($record->id, ['attribute_value' => $input['break_news']]);
        }

        if (!empty($input['box_cuff'])) {
            $record = $this->repo->findBy('attribute_key', 'box_cuff');
            $this->repo->update($record->id, ['attribute_value' => $input['box_cuff']]);
        }

        if (!empty($input['main_cuff'])) {
            $record = $this->repo->findBy('attribute_key', 'main_cuff');
            $this->repo->update($record->id, ['attribute_value' => $input['main_cuff']]);
        }

        if (!empty($input['mini_cuff'])) {
            $record = $this->repo->findBy('attribute_key', 'mini_cuff');
            $this->repo->update($record->id, ['attribute_value' => $input['mini_cuff']]);
        }

        if (!empty($input['find_tags_in_content'])) {
            $record = $this->repo->findBy('attribute_key', 'find_tags_in_content');
            $this->repo->update($record->id, ['attribute_value' => $input['find_tags_in_content']]);
        }

        if (!empty($input['automatic_add_tags'])) {
            $record = $this->repo->findBy('attribute_key', 'automatic_add_tags');
            $this->repo->update($record->id, ['attribute_value' => $input['automatic_add_tags']]);
        }

        if (!empty($input['is_show_editor_profile_in_news'])) {
            $record = $this->repo->findBy('attribute_key', 'is_show_editor_profile_in_news');
            $this->repo->update($record->id, ['attribute_value' => $input['is_show_editor_profile_in_news']]);
        }

        if (!empty($input['is_show_previous_and_next_news'])) {
            $record = $this->repo->findBy('attribute_key', 'is_show_previous_and_next_news');
            $this->repo->update($record->id, ['attribute_value' => $input['is_show_previous_and_next_news']]);
        }

        Session::flash('flash_message', trans('common.message_model_updated'));
        return Redirect::route($this->redirectRouteName . $this->view . 'index');
    }

}