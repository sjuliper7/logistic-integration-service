<?php

namespace App\Http\Controllers;

use App\DataSource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        $provinceId = $request->query('province_id');
        $dataSource = new DataSource();
        $cities = $dataSource->searchCities($provinceId);

        return $cities;
    }
}
