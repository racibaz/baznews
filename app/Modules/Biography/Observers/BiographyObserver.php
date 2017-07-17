<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 17.07.2017
 * Time: 15:37
 */

namespace App\Modules\Biography\Observers;

use App\Modules\Biography\Models\Biography;

class BiographyObserver
{
    public function saving(Biography $record)
    {
        if ($record->status == 1) {
            $record->is_active  = true;
        }else{
            $record->is_active  = false;
        }
    }
}