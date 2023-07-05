<?php

namespace App;
use GuzzleHttp\Client;

class Rajaongkir
{
    private $client;

    public function __construct($api_key)
    {
        $this->client = new Client();
        $this->api_key = $api_key;
    }

    public function getProvinces()
    {
        $response = $this->client->get('https://api.rajaongkir.com/v2/provinces', [
            'headers' => [
                'key' => $this->api_key,
            ],
        ]);

        var_dump($response);

        return json_decode($response->getBody(), true);
    }

    public function getProvinceById($provinceID)
    {
        $response = $this->client->get('https://api.rajaongkir.com/starter/province?id=' . $provinceID, [
            'headers' => [
                'key' => $this->api_key,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getCities($province_id)
    {
        $response = $this->client->get('https://api.rajaongkir.com/starter/city?province=' . $province_id, [
            'headers' => [
                'key' => $this->api_key,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
