<?php

namespace App\Transformers;

use App\Models\City;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    public function transform(City $record)
    {
        return [
            'id' => (int) $record->id,
            'name' =>  $record->name
        ];
    }
}