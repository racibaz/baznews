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
        return $this->belongsToMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function announcements()
    {
        return $this->belongsToMany(Announcement::class);
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'required|max:255',
            'description' => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function groupList()
    {
        return Group::where('is_active',1)->get();
    }

}
