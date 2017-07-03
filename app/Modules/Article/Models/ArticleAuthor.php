<?php

namespace App\Modules\Article\Models;

use App\Models\User;
use App\Modules\Article\Transformers\ArticleAuthorTransformer;
use App\Traits\Eventable;
use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Venturecraft\Revisionable\RevisionableTrait;

class ArticleAuthor extends Eloquent
{
    use Eventable;
    use RevisionableTrait;
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'id']
            ]
        ];
    }

    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $engine->activateRuleset('turkish');
    }

    protected $table = 'article_authors';
    public $transformer = ArticleAuthorTransformer::class;
    protected $fillable = ['user_id', 'name', 'slug', 'email', 'cv', 'photo', 'description', 'keywords', 'is_quotation', 'is_cuff', 'is_active'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function articleAuthorList()
    {
        return ArticleAuthor::where('is_active', 1)->pluck('name', 'id');
    }
}