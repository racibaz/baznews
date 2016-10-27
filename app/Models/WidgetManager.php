<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class WidgetManager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'namespace',
        'position',
        'group',
        'is_active',
    ];


    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|string',
            'namespace'                     => 'required',
            'position'                      => 'required|numeric',
            'group'                         => 'required',
        );
        return Validator::make($input, $rules);
    }

    public static function getAllWidgets()
    {
        return WidgetManager::where('is_active',1)->get();
    }
}