<?php

namespace App\Modules\News\Http\Controllers\Frontend;

use Caffeinated\Themes\Facades\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    public function getArchive(Request $request)
    {
        dd($request['datetime']);

        //TODO
        /*
         * index() yapılacak yıl ve ay haberleri de listelenebilinir.
         * is_datetime gibi birşeyle kontrol edilip get olarak çekilebilinir.
         *
         * */

        return Theme::view('news::frontend.archive',compact(['records']));
    }

}
