<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinceId = $request->query('id');

        $provinces = Province::where('id', $provinceId)->get();

        return $provinces;
    }
}
