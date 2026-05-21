# 🌦 Weather Dashboard Web Application

A modern and responsive Weather Dashboard web application developed using Laravel, JavaScript, Bootstrap 5, and OpenWeather API integration.

This application allows users to search weather information by city name and view real-time weather data through an interactive and responsive user interface.

---

# 📌 Project Overview

The Weather Dashboard application was developed as part of a technical assessment.

The application provides users with:

- Real-time weather information
- City-based weather search
- Current location weather
- Dynamic weather conditions
- Responsive modern UI

The project focuses on API integration, responsive frontend design, JavaScript functionality, and clean Laravel architecture.

---

# 🚀 Features

## 🌐 Core Features

- Search weather by city name
- Real-time weather API integration
- Current temperature display
- Weather condition display
- Dynamic weather icons
- Humidity information
- Wind speed information
- Feels-like temperature
- Current date & time

---

## ✨ Additional Features

- Current location weather
- 5-day weather forecast
- Loading animations
- Dynamic weather background
- Responsive UI design
- Error handling
- Enter key search support

---

# ⚙️ Tech Stack

| Technology | Version |
|------------|---------|
| PHP | 8.2+ |
| Laravel | 12 |
| HTML5 | Latest |
| CSS3 | Latest |
| JavaScript | ES6 |
| Bootstrap | 5 |
| jQuery | 3+ |
| OpenWeather API | Latest |

---

# 💻 System Requirements

Before installation, ensure your system has:

- PHP 8.2+
- Composer
- Git
- XAMPP / WAMP / Laragon

---

# 📂 Project Structure

```plaintext
app/
bootstrap/
config/
public/
resources/
routes/
storage/
vendor/
```

---

# 📦 Installation Guide

## Step 1 — Clone Repository

```bash
git clone https://github.com/saurabh-98/weather-dashboard.git
```

---

## Step 2 — Open Project Directory

```bash
cd weather-dashboard
```

---

## Step 3 — Install Composer Dependencies

```bash
composer install
```

---

## Step 4 — Create Environment File

### Windows

```bash
copy .env.example .env
```

### Linux / Mac

```bash
cp .env.example .env
```

---

## Step 5 — Generate Application Key

```bash
php artisan key:generate
```

---

# 🔑 Weather API Configuration

This project uses the OpenWeather API for fetching real-time weather data.

## API Base URL

```plaintext
https://api.openweathermap.org/data/2.5
```

## Generate API Key

Create your API key from:

https://openweathermap.org/api

## Add API Key inside `.env`

```env
WEATHER_API_KEY=your_weather_api_key
```

## Example API Request

```plaintext
https://api.openweathermap.org/data/2.5/weather?q=Delhi&appid=YOUR_API_KEY&units=metric
```


---

# ▶️ Run Application

Start Laravel development server:

```bash
php artisan serve
```

Application URL:

```plaintext
http://127.0.0.1:8000
```

---

# 🌦 Weather Information Displayed

After searching a city, the application displays:

- City Name
- Temperature
- Weather Condition
- Weather Icon
- Humidity
- Wind Speed
- Feels-like Temperature
- Current Date & Time

---

# ⚡ API Features

- Real-time weather data
- Dynamic API integration
- Error handling
- Invalid city validation
- Loading states
- API failure handling

---

# 🎨 UI/UX Features

- Modern responsive UI
- Interactive weather cards
- Dynamic weather icons
- Responsive layouts
- Mobile-friendly interface
- Smooth animations and transitions

---

# 📱 Responsive Design

Fully responsive across:

- Desktop
- Laptop
- Tablet
- Mobile Devices

---

# 🔒 Validation & Error Handling

- Empty input validation
- Invalid city validation
- API error handling
- Network failure handling

---

# 📂 Important Artisan Commands

## Clear Cache

```bash
php artisan optimize:clear
```

---

## Route List

```bash
php artisan route:list
```

---

## Start Development Server

```bash
php artisan serve
```

---

# 🧪 Project Testing Checklist

- Weather search working
- API integration working
- Current location working
- 5-day forecast working
- Responsive UI working
- Error handling working
- Dynamic weather display working

---

# 👨‍💻 Developed By

## Saurabh Jha

GitHub:
https://github.com/saurabh-98

---

# 📄 License

This project is developed for technical assessment and educational purposes.

---

# 🙌 Acknowledgement

This project was developed as part of a Weather Dashboard technical assessment using Laravel and OpenWeather API.