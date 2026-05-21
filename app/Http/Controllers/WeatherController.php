<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | WEATHER API BASE URL
    |--------------------------------------------------------------------------
    */

    protected string $baseUrl =
    'https://api.openweathermap.org/data/2.5';

    /*
    |--------------------------------------------------------------------------
    | API KEY
    |--------------------------------------------------------------------------
    */

    protected function apiKey(): string
    {
        return env('WEATHER_API_KEY');
    }

    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('weather-home');
    }

    /*
    |--------------------------------------------------------------------------
    | CURRENT WEATHER
    |--------------------------------------------------------------------------
    */

    public function getWeather(Request $request)
    {
        $request->validate([

            'city' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ]

        ]);

        try {

            $response = Http::timeout(15)

            ->get(

                "{$this->baseUrl}/weather",

                [

                    'q'       => $request->city,

                    'appid'   => $this->apiKey(),

                    'units'   => 'metric'

                ]

            );

            if($response->failed()){

                return response()->json([

                    'success' => false,

                    'message' =>
                    'Unable to fetch weather.'

                ], 500);
            }

            return response()->json([

                'success' => true,

                'data'    => $response->json()

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' =>
                'Weather service unavailable.',

                'error'   =>
                $e->getMessage()

            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | WEATHER FORECAST
    |--------------------------------------------------------------------------
    */

    public function forecast(Request $request)
    {
        $request->validate([

            'city' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ]

        ]);

        try {

            $response = Http::timeout(15)

            ->get(

                "{$this->baseUrl}/forecast",

                [

                    'q'       => $request->city,

                    'appid'   => $this->apiKey(),

                    'units'   => 'metric'

                ]

            );

            if($response->failed()){

                return response()->json([

                    'success' => false,

                    'message' =>
                    'Unable to fetch forecast.'

                ], 500);
            }

            return response()->json([

                'success' => true,

                'data'    => $response->json()

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' =>
                'Forecast service unavailable.',

                'error'   =>
                $e->getMessage()

            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | LOCATION WEATHER
    |--------------------------------------------------------------------------
    */

    public function locationWeather(Request $request)
    {
        $request->validate([

            'lat' => [
                'required',
                'numeric'
            ],

            'lon' => [
                'required',
                'numeric'
            ]

        ]);

        try {

            $response = Http::timeout(15)

            ->get(

                "{$this->baseUrl}/weather",

                [

                    'lat'     => $request->lat,

                    'lon'     => $request->lon,

                    'appid'   => $this->apiKey(),

                    'units'   => 'metric'

                ]

            );

            if($response->failed()){

                return response()->json([

                    'success' => false,

                    'message' =>
                    'Unable to fetch location weather.'

                ], 500);
            }

            return response()->json([

                'success' => true,

                'data'    => $response->json()

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' =>
                'Location weather unavailable.',

                'error'   =>
                $e->getMessage()

            ], 500);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | AIR POLLUTION
    |--------------------------------------------------------------------------
    */

    public function airPollution(Request $request)
    {
        $request->validate([

            'lat' => [
                'required',
                'numeric'
            ],

            'lon' => [
                'required',
                'numeric'
            ]

        ]);

        try {

            $response = Http::timeout(15)

            ->get(

                "{$this->baseUrl}/air_pollution",

                [

                    'lat'     => $request->lat,

                    'lon'     => $request->lon,

                    'appid'   => $this->apiKey()

                ]

            );

            if($response->failed()){

                return response()->json([

                    'success' => false,

                    'message' =>
                    'Unable to fetch air quality.'

                ], 500);
            }

            return response()->json([

                'success' => true,

                'data'    => $response->json()

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'success' => false,

                'message' =>
                'Air quality unavailable.',

                'error'   =>
                $e->getMessage()

            ], 500);
        }
    }
}