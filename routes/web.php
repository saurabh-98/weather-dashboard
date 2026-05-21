<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::controller(WeatherController::class)->group(function () {

    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */

    Route::get('/', 'index')
        ->name('home');

    /*
    |--------------------------------------------------------------------------
    | WEATHER API ROUTES
    |--------------------------------------------------------------------------
    */

    Route::get('/weather/current', 'getWeather')
        ->name('weather.current');

    Route::get('/weather/forecast', 'forecast')
        ->name('weather.forecast');

    Route::get('/weather/location', 'locationWeather')
        ->name('weather.location');

});