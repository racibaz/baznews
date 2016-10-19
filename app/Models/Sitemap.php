<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Sitemap extends Model
{

    protected $table = 'sitemaps';
    
    protected $fillable = [
        'name',
        'url',
        'last_modified',
        'order',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'url'                     => 'max:255',
        );

        return Validator::make($input, $rules);
    }
}
