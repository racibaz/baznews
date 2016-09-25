<?php

namespace App\Modules\Article\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Support\Facades\Validator;
use Venturecraft\Revisionable\RevisionableTrait;

class Article extends Eloquent
{
    use RevisionableTrait;

    use Sluggable;

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

    protected $table = 'articles';
    protected $fillable = ['user_id', 'author_id', 'title', 'slug', 'subtitle', 'spot', 'content', 'description', 'keywords', 'hit', 'order', 'status', 'is_cuff', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function article_categories()
    {
        return $this->belongsToMany('App\Modules\Article\Models\ArticleCategory', 'article_categories_articles', 'article_id', 'article_category_id');
    }

    public static function validate($input) {
        $rules = array(
            'user_id' => 'required',
            'author_id' => 'required',
            'title' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function articleList()
    {
        return Article::where('is_active',1)->pluck('title', 'id');
    }
}