// ======================================================
// WEATHER HOME PAGE JS
// PRODUCTION READY
// ======================================================

document.addEventListener('DOMContentLoaded', () => {

    // ======================================================
    // LOAD CURRENT LOCATION WEATHER BY DEFAULT
    // ======================================================

    loadCurrentLocationWeather();

    // ======================================================
    // SEARCH BUTTON
    // ======================================================

    const homeSearchBtn =
        document.getElementById('homeSearchBtn');

    if (homeSearchBtn) {

        homeSearchBtn.addEventListener('click', () => {

            const city = document
                .getElementById('homeCityInput')
                .value
                .trim();

            if (city !== '') {

                getWeather(city);

            }

        });

    }

    // ======================================================
    // ENTER KEY SEARCH
    // ======================================================

    const homeCityInput =
        document.getElementById('homeCityInput');

    if (homeCityInput) {

        homeCityInput.addEventListener('keypress', (e) => {

            if (e.key === 'Enter') {

                const city =
                    homeCityInput.value.trim();

                if (city !== '') {

                    getWeather(city);

                }

            }

        });

    }

    // ======================================================
    // CURRENT LOCATION BUTTON
    // ======================================================

    const currentLocationBtn =
        document.getElementById(
            'homeCurrentLocationBtn'
        );

    if (currentLocationBtn) {

        currentLocationBtn.addEventListener('click', () => {

            loadCurrentLocationWeather();

        });

    }

    // ======================================================
    // LIVE CLOCK
    // ======================================================

    startLiveClock();

});

/* ======================================================
| LOAD CURRENT LOCATION WEATHER
====================================================== */

async function loadCurrentLocationWeather()
{
    if (!navigator.geolocation) {

        getWeather('Delhi');

        return;

    }

    navigator.geolocation.getCurrentPosition(

        async (position) => {

            try {

                showLoading();

                const lat =
                    position.coords.latitude;

                const lon =
                    position.coords.longitude;

                const apiKey =
                    window.weatherConfig.apiKey;

                // ======================================================
                // WEATHER API
                // ======================================================

                const weatherResponse = await fetch(

                    `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`

                );

                const weatherData =
                    await weatherResponse.json();

                // ======================================================
                // REVERSE GEOCODING
                // ======================================================

                const geoResponse = await fetch(

                    `https://api.openweathermap.org/geo/1.0/reverse?lat=${lat}&lon=${lon}&limit=1&appid=${apiKey}`

                );

                const geoData =
                    await geoResponse.json();

                // ======================================================
                // PROPER LOCATION NAME
                // ======================================================

                if (
                    geoData &&
                    geoData.length > 0
                ) {

                    weatherData.customCityName =
                        geoData[0].name;

                    weatherData.customState =
                        geoData[0].state || '';

                    weatherData.customCountry =
                        geoData[0].country || '';

                }

                // ======================================================
                // FORECAST
                // ======================================================

                const forecastResponse = await fetch(

                    `https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`

                );

                const forecastData =
                    await forecastResponse.json();

                // ======================================================
                // UPDATE UI
                // ======================================================

                updateCurrentWeather(weatherData);

                updateForecast(forecastData);

                updateHighlights(weatherData);

                updateExtraDetails(weatherData);

                hideLoading();

            }
            catch (error) {

                console.error(
                    'Location Error:',
                    error
                );

                hideLoading();

                getWeather('Delhi');

            }

        },

        () => {

            getWeather('Delhi');

        },

        {

            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0

        }

    );
}

/* ======================================================
| GET WEATHER BY CITY
====================================================== */

async function getWeather(city)
{
    try {

        showLoading();

        const apiKey =
            window.weatherConfig.apiKey;

        // ======================================================
        // CURRENT WEATHER
        // ======================================================

        const weatherResponse = await fetch(

            `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`

        );

        const weatherData =
            await weatherResponse.json();

        if (weatherData.cod != 200) {

            alert('City not found');

            hideLoading();

            return;

        }

        // ======================================================
        // FORECAST
        // ======================================================

        const forecastResponse = await fetch(

            `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apiKey}&units=metric`

        );

        const forecastData =
            await forecastResponse.json();

        // ======================================================
        // UPDATE UI
        // ======================================================

        updateCurrentWeather(weatherData);

        updateForecast(forecastData);

        updateHighlights(weatherData);

        updateExtraDetails(weatherData);

        hideLoading();

    }
    catch (error) {

        console.error(
            'Weather Error:',
            error
        );

        hideLoading();

    }
}

/* ======================================================
| UPDATE CURRENT WEATHER
====================================================== */

function updateCurrentWeather(data)
{
    // ======================================================
    // CITY NAME
    // ======================================================

    const cityName =

        `${
            data.customCityName || data.name
        }${
            data.customState
                ? ', ' + data.customState
                : ''
        }, ${
            data.customCountry || data.sys.country
        }`;

    document.getElementById(
        'homeCityName'
    ).innerText = cityName;

    // ======================================================
    // TEMPERATURE
    // ======================================================

    document.getElementById(
        'homeMainTemp'
    ).innerText =

        `${Math.round(data.main.temp)}°C`;

    // ======================================================
    // CONDITION
    // ======================================================

    document.getElementById(
        'homeWeatherCondition'
    ).innerText =

        data.weather[0].main;

    // ======================================================
    // DESCRIPTION
    // ======================================================

    document.getElementById(
        'homeWeatherDescription'
    ).innerText =

        data.weather[0].description;

    // ======================================================
    // ICON
    // ======================================================

    const iconCode =
        data.weather[0].icon;

    document.getElementById(
        'homeWeatherIcon'
    ).src =

        `https://openweathermap.org/img/wn/${iconCode}@2x.png`;

    // ======================================================
    // HUMIDITY
    // ======================================================

    document.getElementById(
        'homeHumidity'
    ).innerText =

        `${data.main.humidity}%`;

    // ======================================================
    // WIND SPEED
    // ======================================================

    document.getElementById(
        'homeWindSpeed'
    ).innerText =

        `${data.wind.speed} km/h`;

    // ======================================================
    // FEELS LIKE
    // ======================================================

    document.getElementById(
        'homeFeelsLike'
    ).innerText =

        `${Math.round(
            data.main.feels_like
        )}°C`;

    // ======================================================
    // VISIBILITY
    // ======================================================

    document.getElementById(
        'homeVisibility'
    ).innerText =

        `${(
            data.visibility / 1000
        ).toFixed(1)} km`;

    // ======================================================
    // UPDATE SEARCH INPUT
    // ======================================================

    const input =
        document.getElementById(
            'homeCityInput'
        );

    if (input) {

        input.value =
            data.customCityName || data.name;

    }

    // ======================================================
    // UPDATE HEADER
    // ======================================================

    window.dispatchEvent(

        new CustomEvent('weatherUpdated', {

            detail: data

        })

    );
}

/* ======================================================
| UPDATE FORECAST
====================================================== */

function updateForecast(data)
{
    const forecastGrid =
        document.getElementById(
            'homeForecastGrid'
        );

    if (!forecastGrid) {

        return;

    }

    forecastGrid.innerHTML = '';

    const dailyForecasts =
        data.list.filter(item =>
            item.dt_txt.includes('12:00:00')
        );

    dailyForecasts.forEach(day => {

        const date =
            new Date(day.dt_txt);

        forecastGrid.innerHTML += `

            <div class="weather-forecast-card">

                <h4>
                    ${date.toLocaleDateString(
                        'en-US',
                        {
                            weekday: 'short'
                        }
                    )}
                </h4>

                <img
                    src="https://openweathermap.org/img/wn/${day.weather[0].icon}@2x.png"
                    alt="Forecast"
                >

                <h2>
                    ${Math.round(day.main.temp)}°C
                </h2>

                <p>
                    ${day.weather[0].main}
                </p>

            </div>

        `;

    });
}

/* ======================================================
| UPDATE HIGHLIGHTS
====================================================== */

function updateHighlights(data)
{
    // AIR QUALITY MOCK
    document.getElementById(
        'homeAirQuality'
    ).innerText = 'Good';

    // SUNRISE
    const sunrise =
        new Date(
            data.sys.sunrise * 1000
        );

    document.getElementById(
        'homeSunrise'
    ).innerText =

        sunrise.toLocaleTimeString();

    // SUNSET
    const sunset =
        new Date(
            data.sys.sunset * 1000
        );

    document.getElementById(
        'homeSunset'
    ).innerText =

        sunset.toLocaleTimeString();
}

/* ======================================================
| UPDATE EXTRA DETAILS
====================================================== */

function updateExtraDetails(data)
{
    // UV INDEX MOCK
    const uvValue =
        Math.floor(Math.random() * 11);

    document.getElementById(
        'homeUvIndex'
    ).innerText = uvValue;

    // UV LABEL
    let uvLabel = 'Low';

    if (uvValue >= 8) {

        uvLabel = 'Very High';

    }
    else if (uvValue >= 6) {

        uvLabel = 'High';

    }
    else if (uvValue >= 3) {

        uvLabel = 'Moderate';

    }

    document.getElementById(
        'homeUvLabel'
    ).innerText = uvLabel;

    // PRESSURE
    document.getElementById(
        'homePressure'
    ).innerText =

        data.main.pressure;

    // CLOUDINESS
    document.getElementById(
        'homeCloudiness'
    ).innerText =

        `${data.clouds.all}%`;

    // DEW POINT
    const dewPoint =
        Math.round(
            data.main.temp -
            (
                (100 - data.main.humidity) / 5
            )
        );

    document.getElementById(
        'homeDewPoint'
    ).innerText =

        `${dewPoint}°C`;

    // DEW LABEL
    let comfort = 'Comfortable';

    if (dewPoint >= 24) {

        comfort = 'Very Humid';

    }
    else if (dewPoint >= 18) {

        comfort = 'Humid';

    }

    document.getElementById(
        'homeDewComfort'
    ).innerText = comfort;
}

/* ======================================================
| LIVE CLOCK
====================================================== */

function startLiveClock()
{
    function updateClock()
    {
        const now = new Date();

        const clock =
            document.getElementById(
                'homeLiveDateTime'
            );

        if (clock) {

            clock.innerText =
                now.toLocaleString();

        }
    }

    updateClock();

    setInterval(updateClock, 1000);
}

/* ======================================================
| LOADING
====================================================== */

function showLoading()
{
    document.body.classList.add(
        'weather-loading'
    );
}

function hideLoading()
{
    document.body.classList.remove(
        'weather-loading'
    );
}