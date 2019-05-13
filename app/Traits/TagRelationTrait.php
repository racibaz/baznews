<?php

namespace App\Traits;


trait TagRelationTrait
{
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}