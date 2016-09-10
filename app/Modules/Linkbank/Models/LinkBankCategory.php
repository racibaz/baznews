<?php

namespace App\Modules\Linkbank\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class LinkBankCategory extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
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
