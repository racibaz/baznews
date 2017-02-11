<?php

namespace App\Jobs\Ping;



use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use JJG\Ping;

class SendPing implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $ping = \App\Models\Ping::first();

        $pingList = explode('/n' , $ping->ping_list);

        $host = 'www.google.com';
        $ping = new Ping($host);
        $latency = $ping->ping();
        if ($latency !== false) {
            print 'Latency is ' . $latency . ' ms';
        }
        else {
            print 'Host could not be reached.';
        }
    }
}
