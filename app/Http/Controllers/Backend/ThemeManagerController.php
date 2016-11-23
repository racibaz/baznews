<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ThemeManager;
use App\Repositories\ThemeManagerRepository as Repo;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ThemeManagerController extends Controller
{
    private $repo;
    private $view = 'theme_manager.';
    private $redirectViewName = 'backend.';
    private $redirectRouteName = '';

    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function getViewName($methodName)
    {
        return $this->redirectViewName . $this->view . $methodName;
    }

    public function index()
    {
        $themes = Theme::all();
        $activeTheme = Theme::getActive();

        $records = $this->repo->findAll();
        return Theme::view($this->getViewName(__FUNCTION__),compact(
            'records',
            'themes',
            'activeTheme'
        ));
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


    public function show(ThemeManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(ThemeManager $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
    }


    public function update(Request $request, ThemeManager $record)
    {
        return $this->save($record);
    }


    public function destroy(ThemeManager $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();
        $input['is_active'] = Input::get('is_active') == "on" ? true : false;

        $v = ThemeManager::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            if (isset($record->id)) {
                $result = $this->repo->update($record->id,$input);
            } else {
                $result = $this->repo->create($input);
                if (!empty($result)) {
                    $result = true;
                }
            }
            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::route($this->redirectRouteName . $this->view . 'index', $record);
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }

    public function themeActivationToggle($themeSlug)
    {
        Theme::setActive($themeSlug);
        return Redirect::back();
    }
}