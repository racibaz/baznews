<?php

namespace App\Models;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{

    use EntrustUserTrait;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'country_id',
        'city_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'slug',
        'cell_phone',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'sex',
        'blood_type',
        'avatar',
        'IP',
        'last_login',
        'status',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function groups()
    {
        //return $this->belongsToMany('App\Group');
        return $this->belongsToMany('App\Models\Group','group_user','user_id', 'group_id');
    }

    public function roles()
    {
        //return $this->belongsToMany('App\Role');
        return $this->belongsToMany('App\Models\Role','role_user','user_id', 'role_id');
    }


//
//    /**
//     * Get all of the owning imageable models.
//     */
//    public function userable()
//    {
//        return $this->morphTo();
//    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

//    public function userable()
//    {
//        return $this->morphTo();
//    }

    public function attachments()
    {
        return $this->morphMany('App\Models\Attachment', 'attachmentable');
    }


    public static function UserFullName()
    {
        return Auth::user()->first_name .' '. Auth::user()->last_name;
    }

    public static function userList()
    {
        return User::where('is_active',1)->lists('first_name', 'id');
    }


    public static function getAllUsers()
    {
        return User::where('is_active',1)->get();
    }

    public static  function getUsersByGroupId($group_id){

        $group = Group::where('id',$group_id)->first();
        return $group->users;
    }

    public static function validate($input) {
        $rules = array(
            'first_name'                    => 'required|max:255',
            'last_name'                     => 'required|max:255',
            'email'                         => 'required|Between:3,64|email|Unique:users',
            'password'                      => 'required|min:4|Confirmed',
            'password_confirmation'         => 'required|min:4',
        );

        return Validator::make($input, $rules);
    }


    public static function getUserIp()
    {
        return Request::ip();
    }







}