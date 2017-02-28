<?php

namespace App\Modules\Article\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ArticleSetting extends Model
{
    protected $table = 'settings';

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attribute_key',
        'attribute_value',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
//            'attribute_key' => 'required',
            'article_authors_widget_list_count' => 'integer',
            'article_count' => 'integer',
            'article_author_count' => 'integer',
            'recent_article_widget_list_count' => 'integer',
        );
        return Validator::make($input, $rules);
    }
}
