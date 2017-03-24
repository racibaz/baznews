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
        return $this->belongsToMany(Role::class,'permission_role','permission_id', 'role_id');
    }

    public static function permissionList()
    {
        return Permission::where('is_active',1)->get();
    }
}