<?php

namespace App\Http\Services;

use App\Http\Classes\WeatherApi;
use App\Http\Classes\WeatherForecastApi;
use App\Http\Classes\PlacesApi;

class SearchService
{
    public function search(string $cityName): array
    {
        $data = [];

        $weatherApi = new WeatherApi($cityName);
        $url = $weatherApi->url();
        $header = $weatherApi->headers();
        $weatherData = $weatherApi->fetch($url, $header);

        // continue search if first API call's status is 200
        if ($weatherData['cod'] == 200) {
            $weatherForecastApi = new WeatherForecastApi($cityName);
            $url = $weatherForecastApi->url();
            $header = $weatherForecastApi->headers();
            $weatherForecastData = $weatherForecastApi->fetch($url, $header);
            $weatherForecastData = $weatherForecastData['list'];

            $placesApi = new PlacesApi($cityName, "16000", 5);
            $url = $placesApi->url();
            $header = $placesApi->headers();
            $placesData = $placesApi->fetch($url, $header);
            $placesData = $placesData['results'];

            $data = [
                'weather' => $weatherData,
                'weatherForecast' => $weatherForecastData,
                'places' => $placesData
            ];
        }

        return $data;
    }
}