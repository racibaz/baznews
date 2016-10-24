<?php

namespace App\Modules\News\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RecommendationNews extends Model
{
    protected $table = 'recommendation_news';

    protected $fillable = [
        'user_id',
        'news_id',
        'order',
        'is_cuff',
        'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
