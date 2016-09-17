<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class FutureNews extends Model
{
    protected $table = 'future_news';
    protected $fillable = ['news_id', 'future_datetime', 'is_active'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public static function validate($input) {
        $rules = array(
            'news_id' => 'required',
            'future_datetime' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function futureNewsList()
    {
        return FutureNews::where('is_active',1)->pluck('news_id', 'id');
    }
}
