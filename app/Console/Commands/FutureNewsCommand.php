<?php

namespace App\Console\Commands;

use App\Http\Controllers\Backend\BackendController;
use App\Modules\News\Models\FutureNews;
use App\Modules\News\Models\News;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FutureNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'future-news:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating Future News';

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
        $future_news_ids = FutureNews::where('future_datetime', '>', Carbon::now()->toDateTimeString())
            ->where('future_datetime', '<', Carbon::now()->addHour(1)->toDateTimeString())
            ->where('is_active', 1)
            ->get()
            ->pluck('news_id');

        News::whereIn('id', $future_news_ids)
            ->update([
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);

        app(BackendController::class)->removeCacheTags(['News']);
        app(BackendController::class)->removeHomePageCache();

        return true;
    }
}
