<?php

namespace App\Transformers;

use App\Models\Country;
use App\Models\Menu;
use League\Fractal\TransformerAbstract;

class MenuTransformer extends TransformerAbstract
{
    public function transform(Menu $record)
    {
        $data = [
            'id' => (int) $record->id,
            'left' => (int) $record->_lft,
            'right' => (int) $record->_rgt,
            'name' => (string) $record->name,
            'slug' => (string) $record->slug,
            'url' => (string) $record->url,
            'route' => (string) $record->route,
            'icon' => (string) $record->icon,
            'order' => (int) $record->order,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('menus.show', $record->id),
                ],
                [
                    'rel' => 'parent',
                    'href' => route('menus.show', $record->parent_id),
                ],
                [
                    'rel' => 'menus.page',
                    'href' => route('pages.show', $record->page_id),
                ],
            ]
        ];

        return $data;
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'parent' => 'parent_id',
            'left' => '_lft',
            'right' => '_rgt',
            'name' => 'name',
            'slug' => 'slug',
            'order' => 'order',
            'active' => 'is_active'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}