<?php

namespace App\Http\Traits;

Trait ConverterTrait
{
    public function kelvinToCelsius($temperature): float 
    {
        return $temperature - 273.15;
    }

    public function mpsToKph($speed): float 
    {
        return $speed * 3.6;
    }

    public function utcToGmt($timestamp): string 
    {
        date_default_timezone_set("Asia/Tokyo"); // set timezone

        return date('M d, Y g:i A', $timestamp);
    }

    public function numToPercent($num): float 
    {
        return $num * 100;
    }

    public function metersToKilometers($distance): float 
    {
        return $distance / 1000;
    }
}
