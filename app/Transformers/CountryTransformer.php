<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{
    public function transform(Country $record)
    {
        return [
            'id' => (int) $record->id,
            'name' =>  $record->name
        ];
    }
}