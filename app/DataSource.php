<?php

namespace App;

use App\Models\Province;

class DataSource
{
    public function __construct()
    {
    }

    public function searchProvinces($province_id)
    {
        $driver = config('datasource.driver');

        if ($driver === 'RAJA_ONGKIR') {
            // Get the provinces from the Rajaongkir API.
            $api = new Rajaongkir(env('RAJA_ONGKIR_API_KEY'));
            $data = $api->getProvinceById($province_id);
            $provinces = $data['rajaongkir']['results'];
        } else {
            // Get the provinces from the database.
            $provinces = Province::where('id', $province_id)->get();
        }

        return $provinces;
    }

    public function searchCities($province_id)
    {
        $driver = config('datasource.driver');

        if ($driver === 'RAJA_ONGKIR') {
            // Get the cities from the Rajaongkir API.
            $api = new Rajaongkir(env('RAJA_ONGKIR_API_KEY'));
            $cities = $api->getCities($province_id);
        }

        return $cities;
    }
}
