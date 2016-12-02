<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class RelatedNews extends Model
{
    protected $table = 'related_news';
    public $timestamps = false;
    protected $fillable = ['news_id', 'related_news_id'];

    public function news()
    {
        return $this->belongsToMany(News::class);
    }

    public static function validate($input) {
        $rules = array(
            'news_id' => 'required',
            'related_news_id' => 'required',
        );
        return Validator::make($input, $rules);
    }
}
