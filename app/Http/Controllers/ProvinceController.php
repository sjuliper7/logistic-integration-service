<?php

namespace App\Http\Controllers;

use App\DataSource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function getProvinces(Request $request)
    {
        $provinceId = $request->query('id');
        $dataSource = new DataSource();

        $provinces = $dataSource->searchProvinces($provinceId);

        return $provinces;
    }
}
