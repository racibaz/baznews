<?php

namespace App\Modules\News\Models;

use App\Models\User;
use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;

class RecommendationNews extends Model
{
    use Eventable;

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
}
