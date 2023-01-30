<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\SearchService;
use App\Http\Classes\Weather;
use App\Http\Classes\Places;
use App\Http\Classes\RecommendedPlaces;

class HomeController extends Controller
{
    public function index()
    {   
        $recommendedPlaces = RecommendedPlaces::list();

        return view('index', [
            'recommendedPlaces' => $recommendedPlaces
        ]);
    }

    public function show(string $cityName, SearchService $searchService)
    {
        $data = $searchService->search($cityName);

        if (!empty($data)) {
            $weather = new Weather();
            $weatherNow = $weather->weatherNow($data['weather']);
            $weatherHourly = $weather->weatherHourly($data['weatherForecast']);

            $places = new Places();
            $nearByPlaces = $places->nearbyPlaces($data['places']);

            return view('results', [
                'cityName' => ucwords($cityName),
                'weatherNow' => $weatherNow,
                'weatherHourly' => $weatherHourly,
                'nearByPlaces' => $nearByPlaces
            ]);
        } else {
            abort(404);
        }
    }
}
