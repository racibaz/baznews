<?php

namespace App\Modules\Article\Models;

use App\Models\User;
use App\Modules\Article\Transformers\ArticleTransformer;
use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\RevisionableTrait;

class Article extends Eloquent
{
    use Eventable;
    use SoftDeletes;
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
                'source' => ['title','id']
            ]
        ];
    }

    protected $table = 'articles';

    public $transformer = ArticleTransformer::class;
    public static $statuses = ['Passive', 'Active', 'Draft', 'On Air', 'Preparing', 'Pending for Editor Approval', 'Garbage'];

    protected $fillable = ['user_id', 'article_author_id', 'title', 'slug', 'short_url', 'subtitle', 'spot', 'content', 'description', 'keywords', 'hit', 'order', 'status', 'is_cuff', 'is_active'];
    protected $dates = ['created_at','updated_at','deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article_author()
    {
        return $this->belongsTo(ArticleAuthor::class);
    }

    public function article_categories()
    {
        return $this->belongsToMany(ArticleCategory::class, 'article_categories_articles', 'article_id', 'article_category_id');
    }

    public static function articleList()
    {
        return Article::where('is_active',1)->pluck('title', 'id');
    }
}