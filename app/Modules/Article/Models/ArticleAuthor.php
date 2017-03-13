<?php

namespace App\Modules\Article\Models;

use App\Models\Event;
use App\Models\User;
use App\Traits\Eventable;
use Cviebrock\EloquentSluggable\Sluggable;
use Eloquent;
use Illuminate\Support\Facades\Validator;
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
    public function sluggable() {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }
    protected $table = 'article_authors';
    protected $fillable = ['user_id', 'name', 'slug', 'email', 'cv', 'photo', 'description', 'keywords', 'is_quotation', 'is_cuff', 'is_active'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate($input) {
        $rules = array(
//            'user_id' => 'integer',
            'name' => 'required',
            'email' => 'email',
            'photo' => 'image|max:255',
            'description' => 'max:255',
            'keywords' => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function articleAuthorList()
    {
        return ArticleAuthor::where('is_active',1)->pluck('name', 'id');
    }
}