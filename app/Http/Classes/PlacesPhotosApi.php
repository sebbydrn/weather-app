<?php

namespace App\Http\Classes;

use Illuminate\Support\Facades\Http;
use App\Http\Interfaces\ApiInterface;

class PlacesPhotosApi extends Api implements ApiInterface
{   
    private static $placeId;
    
    public function __construct($placeId)
    {
        self::$apiUrl = config('api.fourSquare.host');
        self::$apiKey = config('api.fourSquare.key');
        self::$placeId = $placeId; // fsq_id
    }

    public function url()
    {
        $url = self::$apiUrl . self::$placeId . "/photos";

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