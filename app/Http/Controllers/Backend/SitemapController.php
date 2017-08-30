<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SitemapRequest;
use App\Models\Sitemap;
use App\Repositories\SitemapRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SitemapController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'sitemap.';
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


    public function store(SitemapRequest $request)
    {
        return $this->save($this->repo->createModel());
    }

    
    public function edit(Sitemap $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(SitemapRequest $request, Sitemap $record)
    {
        return $this->save($record);
    }


    public function destroy(Sitemap $record)
    {
        $this->repo->delete($record->id);
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
            Session::flash('flash_message', trans('common.message_model_updated'));
            return Redirect::route($this->redirectRouteName . $this->view . 'index', $result);
        } else {
            return Redirect::back()
                ->withErrors(trans('common.save_failed'))
                ->withInput($input);
        }
    }
}
