<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class News extends Model
{
    protected $table = 'news';

    //TODO eklenebilecekler show_time
    protected $fillable = ['country_id', 'city_id', 'news_resource_id', 'title', 'slug', 'spot', 'content', 'description', 'keywords',
        'meta_tags', 'thumbnail', 'hit', 'status', 'band_news', 'box_cuff', 'is_cuff','break_news', 'is_comment', 'main_cuff' ,'mini_cuff' ,'map', 'is_active'];

    public function news_categories()
    {
        return $this->belongsToMany('App\Modules\News\Models\NewsCategory', 'news_categories_news', 'news_id', 'news_category_id');
    }

    public static function validate($input) {
        $rules = array(
            'title' => 'Required',
            'spot' => 'Required',
            'content' => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function newsList()
    {
        return News::where('is_active',1)->pluck('title', 'id');
    }
}
