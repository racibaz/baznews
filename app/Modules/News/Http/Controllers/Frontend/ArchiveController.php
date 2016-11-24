<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function getArchive()
    {

        //TODO
        /*
         * is_datetime gibi birşeyle kontrol edilip get olarak çekilebilinir.
         *
         * */

        return Theme::view('news::frontend.archive',compact(['records']));
    }

    public function postArchive($datatime = null)
    {
        dd($datatime);
        return Theme::view('news::frontend.archive',compact(['records']));
    }
}
