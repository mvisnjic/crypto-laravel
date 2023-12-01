<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Task

Using Laravel, create an app that will list cryptocurrency values in USD.

There will be a second list that will display top 10 currencies sorted by percent_change_15m

Take the data from this endpoint: https://api.coinpaprika.com/v1/tickers

Simulate a cron job using a command that will update price, percent_change_15m and add new currencies.

The user will be able to edit the price for a currency, and after a price is edited it should not receive future updates from the api.

App design is not important, bare HTML is fine. Code architecture/quality is the only thing that's important, it's fine if you run out of time without completing all tasks.

Publish your code on github and provide us with the repo URL.

## Run the project
1. Clone the project
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`
5. `touch database/database.sqlite`
6. `php artisan migrate`
7. `php artisan update:crypto-currencies`
8. `php artisan serve`
