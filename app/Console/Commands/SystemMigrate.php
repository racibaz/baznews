<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class SystemMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'baznews:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates migrate and seed all of system and flush all redis records';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Artisan::call('migrate');
        \Artisan::call('db:seed');
        \Artisan::call('module:migrate');
        \Artisan::call('module:seed');
        \Artisan::call('migrate', ['--path' => 'vendor/venturecraft/revisionable/src/migrations']);
        Redis::flushall();
    }
}