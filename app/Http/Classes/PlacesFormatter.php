<?php

namespace App\Http\Classes;

use App\Http\Traits\ConverterTrait;

class PlacesFormatter
{
    use ConverterTrait;

    public function formatter($data, $photos): array
    {
        return [
            'name' => $data['name'],
            'address' => $data['location']['formatted_address'],
            'distance' => 
            number_format($this->metersToKilometers($data['distance']), 2),
            'icon_link' => $data['categories'][0]['icon']['prefix'],
            'icon_image_type' => $data['categories'][0]['icon']['suffix'],
            'photo_original' => $photos[0]['prefix'] . "original" . 
            $photos[0]['suffix'],
            'photo_200' => $photos[0]['prefix'] . "200x200" . 
            $photos[0]['suffix']
        ];
    }
}