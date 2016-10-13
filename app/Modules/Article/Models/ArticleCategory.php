<?php

namespace App\Modules\Article\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ArticleCategory extends Model
{
    use Sluggable;

    use NodeTrait;
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['title']
            ]
        ];
    }

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

    public static function articleCategories()
    {
        return ArticleCategory::where('is_active',1)->get();
    }
}
