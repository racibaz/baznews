<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Link extends Model
{
    protected $fillable = [
        'url',
        'linkable_id',
        'linkable_type',
    ];

    /**
     * Get all of the owning linkable models.
     */
    public function linkable()
    {
        return $this->morphTo();
    }

    public static function validate($input)
    {
        $rules = array(
            'url' => 'required|max:255'
        );
        return Validator::make($input, $rules);
    }

    public static function linksList()
    {
        return self::pluck('url', 'url');
    }

    public static function getLinksWithType()
    {
        $linkList = [];

        foreach (self::all() as $key => $value) {

            //get polymorphic table type name
            $typeArray = explode('\\', $value->linkable_type);
            $type = end($typeArray);
            //replace for route usage
            $type = str_replace('_', '-', snake_case($type));

            $linkList[$type . '/' . $value->url] = $type . '/' . $value->url;
        }

        return $linkList;
    }

}
