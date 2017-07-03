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

class Role extends EntrustRole
{
    use Eventable;

    protected $fillable = [
        'name',
        'display_name',
        'is_active',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_role', 'role_id', 'group_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

    public static function roleList()
    {
        return Role::all();
    }
}