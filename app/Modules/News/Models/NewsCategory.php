<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NewsCategory extends Model
{
    protected $table = 'news_categories';
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'icon', 'is_cuff', 'is_active'];

    public function news()
    {
        return $this->belongsToMany('App\Modules\News\Models\NewsCategory', 'news_categories_news', 'news_category_id', 'news_id');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function newsCategoryList()
    {
        return NewsCategory::where('is_active',1)->pluck('name', 'id');
    }
}
