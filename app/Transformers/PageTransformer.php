<?php

namespace App\Transformers;

use App\Models\Country;
use App\Models\Menu;
use App\Models\Page;
use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    public function transform(Page $record)
    {
        $data = [
            'id' => (int) $record->id,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'content' => (string) $record->content,
            'description' => (string) $record->description,
            'keywords' => (string) $record->keywords,
            'comment' => (int) $record->is_commnet,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('pages.show', $record->id),
                ],
                [
                    'rel' => 'pages.menus',
                    'href' => route('pages.menus.show', $record->id),
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
            'comment' => 'is_comment',
            'active' => 'is_active',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}