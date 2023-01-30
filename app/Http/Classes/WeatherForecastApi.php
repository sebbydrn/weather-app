<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\Http;
use App\Http\Interfaces\ApiInterface;

class WeatherForecastApi extends Api implements ApiInterface
{
    private static $countryCode;
    private static $cityName;

    public function __construct($cityName)
    {
        self::$apiUrl = config('api.openWeatherMap.host');
        self::$apiKey = config('api.openWeatherMap.key');
        self::$countryCode = 'JP'; // Japan country code
        self::$cityName = $cityName;
    }

    public function url()
    {
        $url = self::$apiUrl . "forecast?q=" . self::$cityName . ","
        . self::$countryCode . "&appid=" . self::$apiKey;

        return $url;
    }

    public function headers()
    {
        return [];
    }

    public function fetch($url, $headers)
    {
        return Http::withHeaders($headers)->get($url)->json();
    }
}