<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ArticleSetting extends Model
{


    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_count',
        'article_author_count',
        'recent_article_widget_list_count',
        'article_authors_widget_list_count'
    ];

    public static function validate($input) {
        $rules = array(
//            'attribute_key' => 'required',
            'article_count' => 'integer',
            'article_author_count' => 'integer',
            'recent_article_widget_list_count' => 'integer',
            'article_authors_widget_list_count' => 'integer',
        );
        return Validator::make($input, $rules);
    }
}
