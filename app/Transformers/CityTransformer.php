<?php

namespace App\Transformers;

use App\Models\City;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    public function transform(City $record)
    {
        $data = [
            'id' => (int) $record->id,
            'name' => (string) $record->name,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('cities.show', $record->id),
                ],
                [
                    'rel' => 'country',
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