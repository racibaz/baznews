<?php

namespace App\Modules\Article\Models;

use App\Models\User;
use Eloquent;
use Illuminate\Support\Facades\Validator;

class Article extends Eloquent
{
    use \Venturecraft\Revisionable\RevisionableTrait;

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