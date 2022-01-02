# PHP Challenge - API + SPA App

[![API Tests](https://github.com/rjiosum/Larave-8-Vue-Tailwind-SPA/actions/workflows/api-test.yml/badge.svg)](https://github.com/rjiosum/Larave-8-Vue-Tailwind-SPA/actions/workflows/api-test.yml)


### Technologies
Laravel 8.73, laravel passport 10.2, vue 2.6.12, vue-router 3.5.1, 
vuex 3.6.2, Bootstrap 4.
  
 
### Prerequisites
```
 Make sure to use a version of php >= 8.0 (php -v).
 Make sure you have composer installed.
 Make sure you have npm installled.   
```

### Features

- Frontend (SPA) built with [Bootstrap] (login, Customers listing, custumer details)
- Command to import all customers from customers.csv
- Job to get get customer latitude & longitude using Google Maps API
- User dashboard, user update profile, user update password.
- Laravel Passport Authentication.
- API Documentation & testing `/api/documentation`
- PHPUnit test for all features. 

### How to Install

- Download (as zip) and extract or git clone the project under your web server's root directory.
   ```bash
  $ https://github.com/dukenst2006/php-challenge.git
  ```
 - Create a file .env using .env.example. Update the files - set app url, database connection, mail connection and laravel passport details.
 
- Run `php artisan key:generate`

- Install dependencies with `Composer` first:
  ```bash
  $ composer install
  ```
- Create two databases one for app (e.g api) and one for app testing (e.g api_testing).  
- Install front-end dependencies with `npm`:
  ```bash
  $ npm install & npm run dev
  ``` 
- Run `php artisan migrate --seed`, this will create a 2 users for testing login. 
  You can use `email: test@gmail.com`, `pwd: secret`

- Run `php artisan passport:install`.

- Run `php artisan import-customers:csv` to import customers from customers.csv file.
NB: latitude & longitude will be fill from Google map API

- To run the tests use `phpunit`:   
  ```bash
  $ php artisan test
  ```

 ### DEMO
 ![Laravel Vue SPA boiler plate Demo](Demo01.gif) 
