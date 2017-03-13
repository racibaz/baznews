<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Advertisement extends Model
{
    use Eventable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|max:255|unique:advertisements',
            'description'                   => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function advertisementList()
    {
        return Advertisement::where('is_active',1)->pluck('name','id');
    }

    public static function advertisements()
    {
        return Advertisement::where('is_active',1)->get();
    }

}
