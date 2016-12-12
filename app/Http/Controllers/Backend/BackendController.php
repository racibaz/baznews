<?php

namespace App\Http\Controllers\Backend;

use App\Modules\News\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class BackendController extends Controller
{

    //todo genel birşey yapılacak
    public function toggleBooleanType( $record, string $key)
    {
        if($record->$key){
            $record->$key =  0;
        }else
            $record->$key = 1;

        $record->save();

        return Redirect::back();
    }
}
