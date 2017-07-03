<?php

namespace App\Modules\News\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class FutureNews extends Model
{
    use Eventable;

    protected $table = 'future_news';
    protected $fillable = ['news_id', 'future_datetime', 'is_active'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public static function futureNewsList()
    {
        return FutureNews::where('is_active', 1)->pluck('news_id', 'id');
    }
}
