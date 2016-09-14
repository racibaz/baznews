<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ContactType extends Model
{
    protected $fillable = ['name', 'is_active'];

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public static function validate($input) {
        $rules = array(
            'name'                     => 'Required',
        );
        return Validator::make($input, $rules);
    }

    public static function contacctTypeList()
    {
        return ContactType::where('is_active',1)->pluck('name','id');
    }
}