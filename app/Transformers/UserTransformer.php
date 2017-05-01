<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $record)
    {
        return [
            'id' => (int) $record->id,
            'name' =>  $record->name,
            'facebook' =>  $record->facebook,
            'twitter' =>  $record->twitter,
            'pinterest' =>  $record->pinterest,
            'linkedin' =>  $record->linkedin,
            'youtube' =>  $record->youtube,
            'web_site' =>  $record->web_site,
            'bio_note' =>  $record->bio_note,
        ];
    }
}