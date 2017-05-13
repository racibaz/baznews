<?php

namespace App\Http\Controllers\Backend;

use App\Models\ThemeManager;
use App\Repositories\ThemeManagerRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ThemeManagerController extends BackendController
{
    public function __construct(Repo $repo)
    {
        parent::__construct();

        $this->view = 'theme_manager.';
        $this->redirectViewName = 'backend.';
        $this->repo= $repo;
    }


    public function index()
    {
        $themes = Theme::all();
        $activeTheme = Theme::getActive();
        $records = $this->repo->findAll();

        return Theme::view($this->getViewName(__FUNCTION__),compact([
            'records',
            'themes',
            'activeTheme'
        ]));
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

    public function themeActivationToggle($themeSlug)
    {
        $this->changeEnv(['ACTIVE_THEME' => $themeSlug]);

        \Artisan::call('config:clear');
        \Artisan::call('config:cache');

        //todo çalışmıyor.
//        $this->dispatch(new FlushAllCache());

        //Delete all cache
        Cache::flush();


        Log::info('Theme changed to the '. $themeSlug);
        Session::flash('flash_message', trans('setting.themeActivationToggle'));
        return Redirect::back();
    }



    /**
     * http://laravel-tricks.com/tricks/change-the-env-dynamically
     * Calls the method
     */
    public function something(){
        // some code
        $env_update = $this->changeEnv([
            'DB_DATABASE'   => 'new_db_name',
            'DB_USERNAME'   => 'new_db_user',
            'DB_HOST'       => 'new_db_host'
        ]);
        if($env_update){
            // Do something
        } else {
            // Do something else
        }
        // more code
    }

    protected function changeEnv($data = array()){
        if(count($data) > 0){

            // Read .env-file
            $env = file_get_contents(base_path() . '/.env');

            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

            // Loop through given data
            foreach((array)$data as $key => $value){

                // Loop through .env-data
                foreach($env as $env_key => $env_value){

                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

            // Turn the array back to an String
            $env = implode("\n", $env);

            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;
        } else {
            return false;
        }
    }

}
