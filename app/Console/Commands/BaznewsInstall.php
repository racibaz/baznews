<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BaznewsInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'baznews:install';

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
     * @return bool
     */
    public function handle()
    {
        \Artisan::call('migrate',['--force' => true]);
        \Artisan::call('db:seed',['--force' => true]);
        \Artisan::call('module:migrate',['--force' => true]);
        \Artisan::call('module:seed',['--force' => true]);
        \Artisan::call('migrate', [
            '--path' => 'vendor/venturecraft/revisionable/src/migrations',
            '--force' => true
        ]);
        \Artisan::call('passport:install',['--force' => true]);
        \Cache::flush();

        return true;
    }
}
