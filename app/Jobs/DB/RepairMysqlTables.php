<?php

namespace App\Jobs\DB;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RepairMysqlTables implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {

            foreach ($table as $key => $value) {
                $repairTable = DB::statement('REPAIR TABLE ' . $value);

                if (!$repairTable) {

                    Log::error('Database table repair error : ' . $value);
                }
            }
        }
    }
}
