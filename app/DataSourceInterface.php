<?php

namespace App;

interface DataSourceInterface
{
    public function searchProvinces($province_id);

    public function searchCities($province_id);
}
