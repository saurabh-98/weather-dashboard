// ======================================================
// HEADER WEATHER SYSTEM
// PRODUCTION READY
// ======================================================

document.addEventListener('DOMContentLoaded', () => {

    // ======================================================
    // LOAD CURRENT LOCATION WEATHER
    // ======================================================

    loadHeaderCurrentLocationWeather();

    // ======================================================
    // SEARCH
    // ======================================================

    initializeHeaderSearch();

    // ======================================================
    // LIVE CLOCK
    // ======================================================

    startHeaderClock();

});

/* ======================================================
| SEARCH INITIALIZATION
====================================================== */

function initializeHeaderSearch()
{
    const searchBtn =
        document.getElementById(
            'headerSearchBtn'
        );

    const input =
        document.getElementById(
            'headerCityInput'
        );

    // ======================================================
    // BUTTON SEARCH
    // ======================================================

    if (searchBtn) {

        searchBtn.addEventListener('click', () => {

            const city =
                input.value.trim();

            if (city !== '') {

                fetchHeaderWeather(city);

            }

        });

    }

    // ======================================================
    // ENTER SEARCH
    // ======================================================

    if (input) {

        input.addEventListener('keypress', (e) => {

            if (e.key === 'Enter') {

                const city =
                    input.value.trim();

                if (city !== '') {

                    fetchHeaderWeather(city);

                }

            }

        });

    }
}

/* ======================================================
| FETCH WEATHER BY CITY
====================================================== */

async function fetchHeaderWeather(city)
{
    try {

        const apiKey =
            window.weatherConfig.apiKey;

        // ======================================================
        // WEATHER API
        // ======================================================

        const weatherResponse = await fetch(

            `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`

        );

        const weatherData =
            await weatherResponse.json();

        if (weatherData.cod != 200) {

            alert('City not found');

            return;

        }

        // ======================================================
        // GEO LOCATION API
        // ======================================================

        const geoResponse = await fetch(

            `https://api.openweathermap.org/geo/1.0/direct?q=${city}&limit=1&appid=${apiKey}`

        );

        const geoData =
            await geoResponse.json();

        // ======================================================
        // CUSTOM LOCATION
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
        // UPDATE HEADER
        // ======================================================

        updateHeaderWeather(weatherData);

        // ======================================================
        // UPDATE HOME PAGE
        // ======================================================

        window.dispatchEvent(

            new CustomEvent(

                'weatherUpdated',

                {

                    detail: weatherData

                }

            )

        );

    }
    catch (error) {

        console.error(
            'Header Weather Error:',
            error
        );

    }
}

/* ======================================================
| CURRENT LOCATION WEATHER
====================================================== */

async function loadHeaderCurrentLocationWeather()
{
    if (!navigator.geolocation) {

        fetchHeaderWeather('Delhi');

        return;

    }

    navigator.geolocation.getCurrentPosition(

        async (position) => {

            try {

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
                // REVERSE GEO LOCATION
                // ======================================================

                const geoResponse = await fetch(

                    `https://api.openweathermap.org/geo/1.0/reverse?lat=${lat}&lon=${lon}&limit=1&appid=${apiKey}`

                );

                const geoData =
                    await geoResponse.json();

                // ======================================================
                // ACCURATE LOCATION
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
                // UPDATE HEADER
                // ======================================================

                updateHeaderWeather(weatherData);

                // ======================================================
                // UPDATE HOME PAGE
                // ======================================================

                window.dispatchEvent(

                    new CustomEvent(

                        'weatherUpdated',

                        {

                            detail: weatherData

                        }

                    )

                );

            }
            catch (error) {

                console.error(
                    'Current Location Error:',
                    error
                );

                fetchHeaderWeather('Delhi');

            }

        },

        () => {

            fetchHeaderWeather('Delhi');

        },

        {

            enableHighAccuracy: true,
            timeout: 10000,
            maximumAge: 0

        }

    );
}

/* ======================================================
| UPDATE HEADER WEATHER
====================================================== */

function updateHeaderWeather(data)
{
    // ======================================================
    // LOCATION NAME
    // ======================================================

    const locationName =

        `${
            data.customCityName || data.name
        }${
            data.customState
                ? ', ' + data.customState
                : ''
        }, ${
            data.customCountry || data.sys.country
        }`;

    // ======================================================
    // CITY
    // ======================================================

    const city =
        document.getElementById(
            'headerCurrentCity'
        );

    if (city) {

        city.innerText =
            locationName;

    }

    // ======================================================
    // TEMPERATURE
    // ======================================================

    const temp =
        document.getElementById(
            'headerCurrentTemp'
        );

    if (temp) {

        temp.innerText =

            `${Math.round(
                data.main.temp
            )}°C`;

    }

    // ======================================================
    // CONDITION
    // ======================================================

    const condition =
        document.getElementById(
            'headerWeatherCondition'
        );

    if (condition) {

        condition.innerText =
            data.weather[0].main;

    }

    // ======================================================
    // HUMIDITY
    // ======================================================

    const humidity =
        document.getElementById(
            'headerHumidity'
        );

    if (humidity) {

        humidity.innerText =

            `${data.main.humidity}%`;

    }

    // ======================================================
    // WIND SPEED
    // ======================================================

    const wind =
        document.getElementById(
            'headerWindSpeed'
        );

    if (wind) {

        wind.innerText =

            `${data.wind.speed} km/h`;

    }

    // ======================================================
    // AUTO INPUT
    // ======================================================

    const input =
        document.getElementById(
            'headerCityInput'
        );

    if (input) {

        input.value =
            data.customCityName || data.name;

    }
}

/* ======================================================
| LIVE CLOCK
====================================================== */

function startHeaderClock()
{
    function updateClock()
    {
        const now =
            new Date();

        const clock =
            document.getElementById(
                'headerLiveDateTime'
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
| LISTEN HOME PAGE EVENT
====================================================== */

window.addEventListener(

    'weatherUpdated',

    (event) => {

        updateHeaderWeather(
            event.detail
        );

    }

);