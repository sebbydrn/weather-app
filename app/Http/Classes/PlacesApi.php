<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\Http;
use App\Http\Interfaces\ApiInterface;

class PlacesApi extends Api implements ApiInterface
{
    private static $categories;
    private static $limit;
    private static $countryCode;
    private static $cityName;

    public function __construct($cityName, $categories, $limit)
    {
        self::$apiUrl = config('api.fourSquare.host');
        self::$apiKey = config('api.fourSquare.key');
        self::$countryCode = 'JP'; // Japan country code
        self::$cityName = $cityName;
        self::$categories = $categories;
        self::$limit = $limit;
    }

    public function url()
    {
        $url = self::$apiUrl . "search?categories=" . self::$categories .
        "&near=" . self::$cityName . "," . self::$countryCode .
        "&limit=" . self::$limit;

        return $url;
    }

    public function headers()
    {
        return [
            'Authorization' => self::$apiKey,
            'accept' => 'application/json'
        ];
    }

    public function fetch($url, $headers)
    {
        return Http::withHeaders($headers)->get($url)->json();
    }
}