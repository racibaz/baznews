<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Language extends Model
{
    use Eventable;

    protected $fillable = ['name', 'description', 'is_active'];

    public static function validate($input) {
        $rules = array(
            'name' => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function languageList()
    {
        return Language::where('is_active',1)->pluck('name', 'id');
    }

}
