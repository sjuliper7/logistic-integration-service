<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Province;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ProvinceCityData extends Command
{
    protected $signature = 'fetch:province-city-data';

    protected $description = 'Fetch province and city data from Rajaongkir API and store it into the database.';

    public function handle()
    {
        $url = 'https://api.rajaongkir.com/starter/province';
        $response = Http::get($url, [
            'key' => env('RAJA_ONGKIR_API_KEY'),
        ]);

        if ($response->status() == 200) {
            $data = $response->json();

            $this->storeProvincesData($data);

            $this->info('Province and city data has been successfully fetched and stored into database.');
        } else {
            $this->error('Failed to fetch province and city data from Rajaongkir API.');
        }
    }

    private function storeProvincesData($data)
    {
        foreach ($data['rajaongkir']['results'] as $province) {
            $result = $this->storeProvince($province);

            $url = 'https://api.rajaongkir.com/starter/city?id=' . $province['province_id'];
            $response = Http::get($url, [
                'key' => env('RAJA_ONGKIR_API_KEY'),
            ]);

            if ($response->status() == 200) {
                $cityData = $response->json();
                $this->storeCitiesData($cityData, $result['id'], $province['province_id']);
            }

        }
    }

    private function storeCitiesData($data, $provinceId, $externalId)
    {
        foreach ($data['rajaongkir']['results'] as $city) {
            $this->storeCity($city, $provinceId, $externalId);
        }
    }

    private function storeProvince($province)
    {
        $this->info('Storing province data: ' . $province['province']);

        $provinceModel = Province::create([
            'external_id' => $province['province_id'],
            'name' => $province['province'],
        ]);

        return $provinceModel;
    }

    private function storeCity($city, $provinceId, $externalId)
    {
        $this->info('Storing city data: ' . $city['city_name']);

        $cityModel = City::create([
            'external_id' => $city['city_id'],
            'province_id' => $provinceId,
            'name' => $city['city_name'],
        ]);
    }
}
