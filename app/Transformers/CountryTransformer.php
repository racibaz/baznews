<?php

namespace App\Transformers;

use App\Models\Country;
use League\Fractal\TransformerAbstract;

class CountryTransformer extends TransformerAbstract
{
    public function transform(Country $record)
    {
        $data = [
            'id' => (int)$record->id,
            'name' => (string)$record->name,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('countries.show', $record->id),
                ],
            ]
        ];

        return $data;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'active' => 'is_active'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}