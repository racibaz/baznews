<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactType extends Model
{
    use Eventable;
    use SoftDeletes;

    protected $fillable = ['name', 'is_active'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public static function contactTypeList()
    {
        return ContactType::where('is_active', 1)->pluck('name', 'id');
    }
}
