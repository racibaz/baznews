<?php

namespace App\Modules\Biography\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Cache;
use Caffeinated\Themes\Facades\Theme;

class BiographyController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo= $repo;
    }

    public function show($slug)
    {
        $id =  substr(strrchr($slug, '-'), 1 );
        return Cache::remember('biography:'.$id, 100, function() use($id) {
            $record = $this->repo
                ->with([
                    'user',
                ])
                ->where('status', 1)
                ->where('is_active', 1)
                ->findBy('id',$id);

            return Theme::view('biography::frontend.biography.show', compact([
                'record',
            ]))->render();
        });
    }
}
