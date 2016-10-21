<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Setting extends Model
{
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
            'attribute_key' => 'required',
        );
        return Validator::make($input, $rules);
    }
}
