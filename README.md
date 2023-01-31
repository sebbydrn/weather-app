
# Weather App

A simple weather information web application created using Laravel 9

## About

This project is developed to provide quick weather information for foreign tourists visiting Japan.

## Screenshots

![ScreenShot](https://github.com/sebbydrn/readme-contents/blob/main/weather-app/weather-app-home.png)

![ScreenShot](https://github.com/sebbydrn/readme-contents/blob/main/weather-app/weather-app-results.png)

## Features

* Mobile-first design
* Search cities in Japan
* Current weather in city
* Weather for the next 24 hours in the city
* Nearby places from the city

## Installation

Clone the project:

```bash
$ git clone https://github.com/sebbydrn/weather-app.git
```

Run composer install:

```bash
$ composer install
```

Copy .env.example to .env on the root folder:

**Windows (Command Prompt)**

```bash
$ copy .env.example .env
```

**MacOS or Linux (Terminal)**

```bash
$ cp .env.example .env
```

Edit .env file and add your Open Weather Map API key and Foursquare API key :

```bash
OPEN_WEATHER_MAP_API_KEY=
FSQ_API_KEY=
```

Generate key:

```bash
$ php artisan key:generate
```

Run the app:

```bash
$ php artisan serve
```

## Notes

This project aims to showcase the implementation of S.O.L.I.D. principles and follow PSR 1, 2, 4, 12 standards.

Mobile-first design was implemented in developing the UI and UX of the app because the target users are foreign tourists, and these users are most likely to use their smartphones and tablets rather than their laptops and desktop computers. The design and feel is minimalistic and was inspired from Google.