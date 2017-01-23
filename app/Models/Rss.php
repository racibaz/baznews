<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Rss extends Model
{
    protected $table = 'rss';

    protected $fillable = [
        'name',
        'url',
        'order',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'url'                     => 'required',
            'order' => 'integer',
        );

        return Validator::make($input, $rules);
    }
}
