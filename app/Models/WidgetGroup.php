<?php

namespace App\Models;

use App\Traits\Eventable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class WidgetGroup extends Model
{
    use Eventable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active',
    ];

    public function widget_managers()
    {
        return $this->hasMany(WidgetManager::class);
    }

    public static function validate($input)
    {
        $rules = array(
            'name' => 'required|string',
        );
        return Validator::make($input, $rules);
    }

    public static function getAllWidgetGroups()
    {
        return WidgetGroup::where('is_active', 1)->get();
    }

    public static function widgetGroupList()
    {
        return WidgetGroup::where('is_active', 1)->pluck('name', 'id');
    }

}
