<?php

namespace App\Http\Classes;

class Api {
    protected static $apiUrl;
    protected static $apiKey;

    public function __construct($apiUrl, $apiKey)
    {
        self::$apiUrl = $apiUrl;
        self::$apiKey = $apiKey;
    }
}
