@extends('layout.weather')

@section('title', 'Weather Dashboard')

@section('content')

<div class="weather-dashboard-home">

    <div class="container-fluid">

        <!-- =====================================================
        | HERO SECTION
        ====================================================== -->

        <section class="weather-home-hero">

            <div class="weather-home-overlay"></div>

            <div class="weather-home-content">

                <!-- =====================================================
                | LEFT CONTENT
                ====================================================== -->

                <div class="weather-home-left">

                    <!-- BADGE -->
                    <div class="weather-badge">

                        <i class="fa-solid fa-cloud-sun"></i>

                        Real-Time Weather Dashboard

                    </div>

                    <!-- TITLE -->
                    <h1 class="weather-home-title">

                        Discover Live Weather
                        Forecast Around The World

                    </h1>

                    <!-- DESCRIPTION -->
                    <p class="weather-home-text">

                        Search any city and get accurate
                        weather information including
                        temperature, humidity,
                        wind speed, visibility,
                        forecast and live conditions.

                    </p>

                    <!-- =====================================================
                    | SEARCH BOX
                    ====================================================== -->

                    <div class="weather-home-search">

                        <i class="fa fa-search"></i>

                        <input
                            type="text"
                            id="homeCityInput"
                            autocomplete="off"
                            placeholder="Search city weather..."
                        >

                        <button
                            type="button"
                            id="homeSearchBtn">

                            <i class="fa fa-search"></i>

                            Search

                        </button>

                    </div>

                    <!-- =====================================================
                    | QUICK SEARCH
                    ====================================================== -->

                    <div class="weather-quick-search">

                        <button
                            type="button"
                            onclick="getWeather('Delhi')">

                            Delhi

                        </button>

                        <button
                            type="button"
                            onclick="getWeather('Mumbai')">

                            Mumbai

                        </button>

                        <button
                            type="button"
                            onclick="getWeather('Chennai')">

                            Chennai

                        </button>

                        <button
                            type="button"
                            onclick="getWeather('Bangalore')">

                            Bangalore

                        </button>

                        <button
                            type="button"
                            onclick="getWeather('Kolkata')">

                            Kolkata

                        </button>

                    </div>

                    <!-- =====================================================
                    | ACTION BUTTONS
                    ====================================================== -->

                    <div class="weather-action-buttons">

                        <button
                            type="button"
                            class="weather-btn-primary"
                            id="homeCurrentLocationBtn">

                            <i class="fa fa-location-crosshairs"></i>

                            Current Location

                        </button>

                        <button
                            type="button"
                            class="weather-btn-secondary"
                            onclick="getForecastByCurrentCity()">

                            <i class="fa fa-cloud"></i>

                            Live Forecast

                        </button>

                    </div>

                </div>

                <!-- =====================================================
                | RIGHT CONTENT
                ====================================================== -->

                <div class="weather-home-right">

                    <div class="weather-live-card">

                        <!-- TOP -->
                        <div class="weather-live-top">

                            <div>

                                <small>

                                    Current Weather

                                </small>

                                <h4 id="homeCityName">

                                    Loading...

                                </h4>

                            </div>

                            <img
                                id="homeWeatherIcon"
                                src=""
                                alt="Weather Icon"
                            >

                        </div>

                        <!-- TEMPERATURE -->
                        <h1
                            class="weather-live-temp"
                            id="homeMainTemp">

                            --

                        </h1>

                        <!-- CONDITION -->
                        <div
                            class="weather-live-condition"
                            id="homeWeatherCondition">

                            Loading...

                        </div>

                        <!-- DESCRIPTION -->
                        <p
                            class="weather-live-description"
                            id="homeWeatherDescription">

                            Fetching weather details...

                        </p>

                        <!-- =====================================================
                        | LIVE STATS
                        ====================================================== -->

                        <div class="weather-live-stats">

                            <!-- HUMIDITY -->
                            <div class="weather-live-stat">

                                <i class="fa fa-droplet"></i>

                                <div>

                                    <span>

                                        Humidity

                                    </span>

                                    <strong id="homeHumidity">

                                        --

                                    </strong>

                                </div>

                            </div>

                            <!-- WIND -->
                            <div class="weather-live-stat">

                                <i class="fa fa-wind"></i>

                                <div>

                                    <span>

                                        Wind Speed

                                    </span>

                                    <strong id="homeWindSpeed">

                                        --

                                    </strong>

                                </div>

                            </div>

                            <!-- FEELS LIKE -->
                            <div class="weather-live-stat">

                                <i class="fa fa-temperature-half"></i>

                                <div>

                                    <span>

                                        Feels Like

                                    </span>

                                    <strong id="homeFeelsLike">

                                        --

                                    </strong>

                                </div>

                            </div>

                            <!-- VISIBILITY -->
                            <div class="weather-live-stat">

                                <i class="fa fa-eye"></i>

                                <div>

                                    <span>

                                        Visibility

                                    </span>

                                    <strong id="homeVisibility">

                                        --

                                    </strong>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- =====================================================
        | FORECAST SECTION
        ====================================================== -->

        <section class="weather-home-section">

            <div class="weather-section-title">

                <div>

                    <h2>

                        5-Day Forecast

                    </h2>

                    <p>

                        Weekly weather prediction

                    </p>

                </div>

            </div>

            <!-- FORECAST GRID -->
            <div
                class="weather-forecast-grid"
                id="homeForecastGrid">

                <!-- DYNAMIC FORECAST -->

            </div>

        </section>

        <!-- =====================================================
        | HIGHLIGHTS SECTION
        ====================================================== -->

        <section class="weather-home-section">

            <div class="weather-section-title">

                <div>

                    <h2>

                        Today's Highlights

                    </h2>

                    <p>

                        Real-time weather details

                    </p>

                </div>

            </div>

            <!-- HIGHLIGHT GRID -->
            <div class="weather-highlight-grid">

                <!-- AIR QUALITY -->
                <div class="weather-highlight-card">

                    <div class="weather-highlight-icon">

                        <i class="fa fa-wind"></i>

                    </div>

                    <h3>

                        Air Quality

                    </h3>

                    <h1 id="homeAirQuality">

                        --

                    </h1>

                </div>

                <!-- SUNRISE -->
                <div class="weather-highlight-card">

                    <div class="weather-highlight-icon">

                        <i class="fa fa-sun"></i>

                    </div>

                    <h3>

                        Sunrise

                    </h3>

                    <h1 id="homeSunrise">

                        --

                    </h1>

                </div>

                <!-- SUNSET -->
                <div class="weather-highlight-card">

                    <div class="weather-highlight-icon">

                        <i class="fa fa-moon"></i>

                    </div>

                    <h3>

                        Sunset

                    </h3>

                    <h1 id="homeSunset">

                        --

                    </h1>

                </div>

                <!-- LIVE TIME -->
                <div class="weather-highlight-card">

                    <div class="weather-highlight-icon">

                        <i class="fa fa-calendar"></i>

                    </div>

                    <h3>

                        Current Time

                    </h3>

                    <h1 id="homeLiveDateTime">

                    </h1>

                </div>

            </div>

        </section>

        <!-- =====================================================
        | EXTRA WEATHER DETAILS
        ====================================================== -->

        <section class="weather-extra-section">

            <div class="weather-extra-grid">

                <!-- UV INDEX -->
                <div class="weather-extra-card">

                    <div class="weather-extra-card-top">

                        <h4>

                            UV Index

                        </h4>

                        <i class="fa fa-sun"></i>

                    </div>

                    <div
                        class="weather-extra-value"
                        id="homeUvIndex">

                        --

                    </div>

                    <div
                        class="weather-extra-label"
                        id="homeUvLabel">

                        Loading...

                    </div>

                </div>

                <!-- PRESSURE -->
                <div class="weather-extra-card">

                    <div class="weather-extra-card-top">

                        <h4>

                            Pressure

                        </h4>

                        <i class="fa fa-gauge-high"></i>

                    </div>

                    <div
                        class="weather-extra-value"
                        id="homePressure">

                        --

                    </div>

                    <div class="weather-extra-label">

                        hPa

                    </div>

                </div>

                <!-- CLOUDINESS -->
                <div class="weather-extra-card">

                    <div class="weather-extra-card-top">

                        <h4>

                            Cloudiness

                        </h4>

                        <i class="fa fa-cloud"></i>

                    </div>

                    <div
                        class="weather-extra-value"
                        id="homeCloudiness">

                        --

                    </div>

                    <div class="weather-extra-label">

                        Cloud Coverage

                    </div>

                </div>

                <!-- DEW POINT -->
                <div class="weather-extra-card">

                    <div class="weather-extra-card-top">

                        <h4>

                            Dew Point

                        </h4>

                        <i class="fa fa-temperature-low"></i>

                    </div>

                    <div
                        class="weather-extra-value"
                        id="homeDewPoint">

                        --

                    </div>

                    <div
                        class="weather-extra-label"
                        id="homeDewComfort">

                        Loading...

                    </div>

                </div>

            </div>

        </section>

    </div>

</div>

@endsection

@push('scripts')

<script>

    window.weatherConfig = {

        apiKey: "{{ env('WEATHER_API_KEY') }}"

    };

</script>


@endpush