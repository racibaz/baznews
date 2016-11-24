<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Archive extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'name',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|min:4|max:255',
        );
        return Validator::make($input, $rules);
    }
}
