<header
    class="weather-header"
    id="weatherMainHeader">

    <div class="container-fluid">

        <div class="weather-header-wrapper">

            <!-- =====================================================
            | LEFT SECTION
            ====================================================== -->

            <div class="weather-left">

                <div class="weather-logo">

                    <div class="weather-logo-icon">

                        <i class="fa-solid fa-cloud-sun"></i>

                    </div>

                    <div class="weather-logo-text">

                        <h4 class="weather-title">

                            Weather Dashboard

                        </h4>

                        <small class="weather-subtitle">

                            Real-Time Weather Forecast & Climate Updates

                        </small>

                    </div>

                </div>

            </div>

            <!-- =====================================================
            | CENTER SEARCH
            ====================================================== -->

            <div class="weather-center">

                <div class="weather-search-box">

                    <div class="weather-search-icon">

                        <i class="fa fa-search"></i>

                    </div>

                    <input
                        type="text"
                        id="headerCityInput"
                        autocomplete="off"
                        placeholder="Search city weather..."
                    >

                    <button
                        id="headerSearchBtn"
                        class="weather-search-btn">

                        <i class="fa fa-search"></i>

                        <span>

                            Search

                        </span>

                    </button>

                </div>

            </div>

            <!-- =====================================================
            | RIGHT SECTION
            ====================================================== -->

            <div class="weather-right">

                <!-- LOCATION -->
                <div class="weather-status-card weather-location-card">

                    <div class="weather-status-content">

                        <small>

                            Current Location

                        </small>

                        <h5 id="headerCurrentCity">

                            Detecting...

                        </h5>

                    </div>

                    <div class="weather-status-icon">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                </div>

                <!-- TEMPERATURE -->
                <div class="weather-status-card weather-temp-card">

                    <div class="weather-status-content">

                        <small>

                            Current Temp

                        </small>

                        <h5 id="headerCurrentTemp">

                            --°C

                        </h5>

                    </div>

                    <div class="weather-status-icon">

                        <i class="fa-solid fa-temperature-half"></i>

                    </div>

                </div>

                <!-- CONDITION -->
                <div class="weather-status-card weather-condition-card d-none d-md-flex">

                    <div class="weather-status-content">

                        <small>

                            Condition

                        </small>

                        <h5 id="headerWeatherCondition">

                            Loading...

                        </h5>

                    </div>

                    <div class="weather-status-icon">

                        <i class="fa-solid fa-cloud-sun"></i>

                    </div>

                </div>

                <!-- HUMIDITY -->
                <div class="weather-status-card weather-humidity-card d-none d-lg-flex">

                    <div class="weather-status-content">

                        <small>

                            Humidity

                        </small>

                        <h5 id="headerHumidity">

                            --%

                        </h5>

                    </div>

                    <div class="weather-status-icon">

                        <i class="fa-solid fa-droplet"></i>

                    </div>

                </div>

                <!-- WIND -->
                <div class="weather-status-card weather-wind-card d-none d-xl-flex">

                    <div class="weather-status-content">

                        <small>

                            Wind Speed

                        </small>

                        <h5 id="headerWindSpeed">

                            -- km/h

                        </h5>

                    </div>

                    <div class="weather-status-icon">

                        <i class="fa-solid fa-wind"></i>

                    </div>

                </div>

                <!-- LIVE TIME -->
                <div class="weather-date-card d-none d-xxl-flex">

                    <div class="weather-date-icon">

                        <i class="fa-solid fa-calendar-days"></i>

                    </div>

                    <div>

                        <small>

                            Live Time

                        </small>

                        <span id="headerLiveDateTime"></span>

                    </div>

                </div>

                <!-- SETTINGS -->
                <button
                    class="weather-settings-btn"
                    id="headerSettingsBtn">

                    <i class="fa-solid fa-gear"></i>

                </button>

            </div>

        </div>

    </div>

</header>