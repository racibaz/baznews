<?php

namespace App\Modules\Biography\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Biography\Repositories\BiographyRepository as Repo;
use Cache;

class BiographyController extends Controller
{
    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    public function show($slug)
    {
        $id = substr(strrchr($slug, '-'), 1);
        return Cache::tags(['BiographyController', 'Biography', 'biography'])->rememberForever('biography:' . $id, function () use ($id) {
            $record = $this->repo
                ->with([
                    'user',
                ])
                ->where('is_active', 1)
                ->findBy('id', $id);

            $otherBiographies = $this->repo
                ->with([
                    'user',
                ])
                ->where('is_active', 1)
                ->findAll()->take(5);

            return view('biography::frontend.biography.show', compact([
                'record',
                'otherBiographies'
            ]))->render();
        });
    }
}
