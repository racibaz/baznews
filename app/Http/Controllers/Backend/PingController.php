<?php

namespace App\Http\Controllers\Backend;


use App\Jobs\Ping\SendPing;
use Carbon\Carbon;
use JJG\Ping;
use Log;
use Redirect;
use Session;
use Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PingController extends BackendController
{
    public function __construct()
    {
        parent::__construct();

        $this->view = 'ping.';
        $this->redirectViewName = 'backend.';
    }

    public function index()
    {
        $ping = \App\Models\Ping::first();

        $pingList = explode('/n' , $ping->ping_list);

        dd($pingList);


        $host = 'www.example.com';
        $ping = new Ping($host);
        $latency = $ping->ping();
        if ($latency !== false) {
            print 'Latency is ' . $latency . ' ms';
        }
        else {
            print 'Host could not be reached.';
        }
    }

    public function edit(Request $request)
    {
        $pingJob = (new SendPing())
            ->delay(Carbon::now()->addMinutes(10));

        dispatch($pingJob);

        $ping = \App\Models\Ping::first();

        $text = trim($ping->ping_list);
        $textAr = preg_split('/[\n\r]+/', $text);

        // remove any extra \r characters
        $textAr = array_filter($textAr, 'trim');

        foreach ($textAr as $index => $host) {
            $ping = new Ping($host);
            $latency = $ping->ping();
            if ($latency !== false) {
                Log::info('Latency is ' . $latency . ' ms : ' . $host);
            } else {
                Log::error('Host could not be reached. : ' . $host);
            }
        }


        $record = \App\Models\Ping::first();
        return Theme::view($this->getViewName(__FUNCTION__),compact(['record']));
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
}
