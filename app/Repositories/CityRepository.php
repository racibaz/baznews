<?php

namespace App\Repositories;

use App\Models\City;
use Rinvex\Repository\Repositories\EloquentRepository;

class CityRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';

    protected $model = 'App\Models\City';

    /**
     * it uses theme plugin which uses partial view.
     *
     * @param $countryId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByCountryId($countryId)
    {
        $cities = City::where('country_id', '=', $countryId)->pluck('name', 'id')->all();
        $data = view('backend.partials.cities_select_box',compact('cities'))->render();
        return response()->json(['options'=>$data]);
    }

}