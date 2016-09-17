<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RecommendationNews extends Model
{
    protected $table = 'recommendation_news';
    protected $fillable = ['user_id', 'news_id', 'is_active'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public static function validate($input) {
        $rules = array(
            'user_id' => 'required',
            'news_id' => 'required',
        );
        return Validator::make($input, $rules);
    }
}
