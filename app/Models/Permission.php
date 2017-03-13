<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 29.8.2016
 * Time: 16:00
 */

namespace App\Models;


use App\Traits\Eventable;
use Zizaco\Entrust\EntrustPermission;
use Illuminate\Support\Facades\Validator;

class Permission extends EntrustPermission
{
    use Eventable;

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'is_active',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','permission_role','permission_id', 'role_id');
    }

    public static function validate($input) {
        $rules = array(
            'name'                    => 'required|max:255',
            'display_name'            => 'max:255',
            'description'             => 'max:255',
        );
        return Validator::make($input, $rules);
    }

    public static function permissionList()
    {
        return Permission::where('is_active',1)->get();
    }

}