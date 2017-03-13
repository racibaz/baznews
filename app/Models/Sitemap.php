<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Sitemap extends Model
{
    use Eventable;

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
            'url'                     => 'required',
            'order' => 'integer',
        );

        return Validator::make($input, $rules);
    }
}
