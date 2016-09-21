<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ArticleCategory extends Model
{
    protected $table = 'article_categories';
    protected $fillable = ['parent_id', '_lft', '_rgt', 'name', 'slug', 'description', 'keywords', 'hit', 'icon', 'is_cuff', 'is_active'];

    public function articles()
    {
        return $this->belongsToMany('App\Modules\Article\Models\Article', 'article_categories_articles', 'article_category_id', 'article_id');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function articleCategoryList()
    {
        return ArticleCategory::where('is_active',1)->pluck('name', 'id');
    }
}
