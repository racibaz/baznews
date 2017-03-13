<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Group extends Model
{
    use Eventable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function announcements()
    {
        return $this->belongsToMany('App\Models\Announcement');
    }

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'description'             => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function groupList()
    {
        return Group::where('is_active',1)->get();
    }

}
