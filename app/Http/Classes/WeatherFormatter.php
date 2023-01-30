<?php

namespace App\Http\Classes;

use App\Http\Traits\ConverterTrait;

class WeatherFormatter
{
    use ConverterTrait;

    public function formatter($data): array
    {
        return [
            'dateTime' => $this->utcToGmt($data['dt']),
            'weather' => $data['weather'][0]['main'],
            'weatherIcon' => $data['weather'][0]['icon'],
            'temperature' => 
            number_format($this->kelvinToCelsius($data['main']['temp'])),
            'minTemperature' => 
            number_format($this->kelvinToCelsius($data['main']['temp_min'])),
            'maxTemperature' => 
            number_format($this->kelvinToCelsius($data['main']['temp_max'])),
            'humidity' => $data['main']['humidity'],
            'windSpeed' => 
            number_format($this->mpsToKph($data['wind']['speed']), 2)
        ];
    }
}
