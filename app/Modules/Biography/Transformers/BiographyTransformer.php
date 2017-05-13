<?php

namespace App\Modules\Biography\Transformers;

use App\Modules\Biography\Models\Biography;
use League\Fractal\TransformerAbstract;

class BiographyTransformer extends TransformerAbstract
{
    public function transform(Biography $record)
    {
        return [
            'id' => (int) $record->id,
            'title' => (string) $record->title,
            'spot' => (string) $record->spot,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'short_url' => (string) $record->short_url,
            'content' => (string) $record->content,
            'photo' => (string) $record->photo,
            'description' => (string) $record->description,
            'keywords' => (string) $record->keywords,
            'order' => (int) $record->order,
            'cuff' => (bool) $record->is_cuff,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('biographies.show', $record->id),
                ],
                [
                    'rel' => 'user',
                    'href' => route('users.show', $record->user_id),
                ]
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'title' => 'title',
            'slug' => 'slug',
            'shortUrl' => 'short_url',
            'status' => 'status',
            'cuff' => 'is_cuff',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}