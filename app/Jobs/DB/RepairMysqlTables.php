<?php

namespace App\Jobs\Users;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateLastLogin implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Carbon $date)
    {
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->update([
            'last_login' => $this->date
         ]);
    }
}
