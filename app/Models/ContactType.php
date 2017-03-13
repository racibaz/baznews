<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class ContactType extends Model
{
    use Eventable;
    use SoftDeletes;

    protected $fillable = ['name', 'is_active'];
    protected $dates = ['created_at','updated_at','deleted_at'];

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
