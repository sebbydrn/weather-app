<?php

namespace App\Http\Classes;

class Places extends PlacesFormatter
{
    public function nearByPlaces($places): array
    {
        $nearByPlaces = [];

        for ($i = 0; $i < count($places); $i++) {
            // class places photos API
            $placesPhotoApi = new PlacesPhotosApi($places[$i]['fsq_id']);
            $url = $placesPhotoApi->url();
            $headers = $placesPhotoApi->headers();
            $photos = $placesPhotoApi->fetch($url, $headers);
            
            array_push($nearByPlaces, parent::formatter($places[$i], $photos));
        }

        return $nearByPlaces;
    }
}