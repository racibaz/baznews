<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 29.8.2016
 * Time: 15:59
 */

namespace App\Models;


use App\Traits\Eventable;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Support\Facades\Validator;

class Role extends EntrustRole
{
    use Eventable;

    protected $fillable = [
        'name',
        'display_name',
        'is_active',
    ];

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'display_name'            => 'max:255',
            'description'             => 'max:255',
        );

        return Validator::make($input, $rules);
    }

    public function groups()
    {
        //return $this->belongsToMany('App\Group');
        return $this->belongsToMany('App\Models\Group','group_role','role_id', 'group_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User','role_user','role_id', 'user_id');
        //return $this->belongsToMany('App\Products', 'products_shops','id_role', 'id_person');
    }

    public function permissions()
    {
        //return $this->belongsToMany('App\Permission');
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id', 'permission_id');
    }

    public static function roleList()
    {
        //return Role::lists('name','id');
        return Role::all();
    }
}