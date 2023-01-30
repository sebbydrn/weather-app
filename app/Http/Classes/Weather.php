<?php

namespace App\Http\Classes;

class Weather extends WeatherFormatter
{
    public function weatherNow($weatherForecast): array
    {
        return parent::formatter($weatherForecast);
    }

    // returns weather every 3 hours for the next 24 hours
    public function weatherHourly($weatherForecast): array
    {
        $weatherHourly = [];

        for ($i = 0; $i < 8; $i++) {
            array_push($weatherHourly, parent::formatter($weatherForecast[$i]));
        }

        return $weatherHourly;
    }   
}
