<?php

namespace App\Modules\News\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class NewsSource extends Model
{
    protected $fillable = ['name', 'url', 'is_active'];

    public static function validate($input) {
        $rules = array(
            'name' => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function newsSourceList()
    {
        return NewsSource::where('is_active',1)->pluck('name', 'id');
    }
}
