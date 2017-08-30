<?php

namespace App\Http\Controllers\Backend;


use App\Jobs\Ping\SendPing;
use Caffeinated\Themes\Facades\Theme;
use Carbon\Carbon;
use JJG\Ping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PingController extends BackendController
{
    public function __construct()
    {
        parent::__construct();

        $this->view = 'ping.';
        $this->redirectViewName = 'backend.';
    }

    //todo index kaldırılmalı mı?
    public function index()
    {
        $ping = \App\Models\Ping::first();

        $pingList = explode('/n', $ping->ping_list);

        dd($pingList);


        $host = 'www.example.com';
        $ping = new Ping($host);
        $latency = $ping->ping();
        if ($latency !== false) {
            print 'Latency is ' . $latency . ' ms';
        } else {
            print 'Host could not be reached.';
        }
    }

    public function edit(Request $request)
    {
        $record = \App\Models\Ping::first();
        return Theme::view($this->getViewName(__FUNCTION__), compact(['record']));
    }


    public function update(Request $request)
    {
        $input = Input::all();

        $v = \App\Models\Ping::validate($input);

        if ($v->fails()) {
            return Redirect::back()
                ->withErrors($v)
                ->withInput($input);
        } else {

            $record = \App\Models\Ping::first();
            $result = $record->update($input);


            if ($result) {
                Session::flash('flash_message', trans('common.message_model_updated'));
                return Redirect::back();
            } else {
                return Redirect::back()
                    ->withErrors(trans('common.save_failed'))
                    ->withInput($input);
            }
        }
    }


    public function sendPing()
    {
        $pingJob = (new SendPing())
            ->delay(Carbon::now()->addMinutes(10));

        $result = dispatch($pingJob);

        if ($result) {
            Session::flash('flash_message', trans('ping.success'));
            return Redirect::back();
        } else {
            return Redirect::back()
                ->withErrors(trans('ping.send_error'));
        }

    }
}
