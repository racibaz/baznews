<?php

namespace App\Jobs\Cache;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cache;

class FlushAll implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $tags;

    public $key;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tags = null, $key = null)
    {
        $this->tags = $tags;
        $this->key = $key;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if ($this->tags != null) {
            if (is_array($this->tags)) {
                Cache::tags($this->tags)->flush();
            } else {
                Cache::tags($this->tags)->flush();
            }
        }

        if ($this->key != null) {
            Cache::forget($this->key);
        }

    }
}
