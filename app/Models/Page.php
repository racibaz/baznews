<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 8.9.2016
 * Time: 16:21
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Page extends Model
{

    protected $fillable = ['title', 'slug', 'content', 'keywords' ,'is_active'];

    public static function validate($input) {
        $rules = array(
            'title'                     => 'Required',
            'content'                   => 'Required',
            'keywords'                  => 'string|min:2|max:255',
        );

        return Validator::make($input, $rules);
    }
}