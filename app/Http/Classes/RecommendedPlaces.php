<?php

namespace App\Http\Classes;

class RecommendedPlaces
{
    public static function list(): array
    {
        return [
            'Tokyo', 
            'Yokohama',
            'Kyoto',
            'Osaka',
            'Sapporo',
            'Nagoya'
        ];
    }
}