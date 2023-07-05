<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(Request $request)
    {
        $provinceId = $request->query('province_id');
        $cities = City::where('province_id', $provinceId)->get();

        return $cities;
    }
}
