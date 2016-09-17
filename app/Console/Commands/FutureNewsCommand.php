<?php

namespace App\Console\Commands;

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
        //TODO SQL HATA VEERİYOR BAKILACAK.
//        $future_news_ids = FutureNews::whereBetween('future_datetime', [Carbon::now(), Carbon::now()->addHour(1)])->get('id')->toArray();
//        $news = News::whereIn('id', $future_news_ids);
//        foreach ($news as $n)
//        {
//            $news->update(['status',3]);
//        }
    }
}
