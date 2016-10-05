<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Repositories\MenuRepository as Repo;

class MenuController extends Controller
{
    private $repo;
    private $view = 'menu.';
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
        $records = $this->repo->findAll();
        $recordsTree = Menu::get()->toTree();
        return Theme::view($this->getViewName(__FUNCTION__),compact('records', 'recordsTree'));
    }


    public function create()
    {
        $record = $this->repo->createModel();
        $menuList = Menu::menuList();
        $pageList = Page::pageList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'menuList', 'pageList']));
    }


    public function store(Request $request)
    {
        return $this->save($this->repo->createModel());
    }


        public function show(Menu $record)
    {
        return Theme::view($this->getViewName(__FUNCTION__),compact('record'));
    }


    public function edit(Menu $record)
    {
        $menuList = Menu::menuList();
        $pageList = Page::pageList();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record', 'menuList', 'pageList']));
    }


    public function update(Request $request, Menu $record)
    {
        return $this->save($record);
    }


    public function destroy(Menu $record)
    {
        $this->repo->delete($record->id);
        return redirect()->route($this->redirectRouteName . $this->view .'index');
    }


    public function save($record)
    {
        $input = Input::all();

        $input['is_active'] = Input::get('is_active') == "on" ? true : false;


        $v = Menu::validate($input);

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
}
