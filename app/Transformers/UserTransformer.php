<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $record)
    {
        $data = [
            'id' => (int) $record->id,
            'name' => (string) $record->name,
            'facebook' => (string) $record->facebook,
            'twitter' => (string) $record->twitter,
            'pinterest' => (string) $record->pinterest,
            'linkedin' => (string) $record->linkedin,
            'youtube' => (string) $record->youtube,
            'web_site' => (string) $record->web_site,
            'bio_note' => (string) $record->bio_note,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('users.show', $record->id),
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
            'slug' => 'slug',
            'status' => 'status'
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}