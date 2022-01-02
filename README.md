# PHP Challenge - API + SPA App


### Technologies used
Laravel 8.73, laravel passport 10.2, vue 2.6.12, vue-router 3.5.1, 
vuex 3.6.2, Bootstrap 4.
  
 
### Prerequisites
```
 - PHP version >= 8.0 (php -v).
 - Composer installed.
 - npm installled.   
```

### Features

- Frontend (SPA) built with [Bootstrap] (login, Customers listing with pagination, custumer details etc..)
- OAuth2 authentication implementation using laravel passport 
- Command to import all customers from customers.csv
- Job to get customer latitude & longitude base on address using Google Maps API
- API Documentation & testing `/api/docs`
- PHPUnit test for all features. 

### How to Install

- Clone the project under your web server's root directory using git or Download (as zip) and extract.
   ```bash
  $ git clone https://github.com/dukenst2006/php-challenge.git
  ```
 - Create a file .env using .env.example. Update the files - set app url, database connection, passport details like client_id & client_secret and  GOOGLE_MAPS_API_KEY.
 ```
  $ cp .env.example .env 
```
 
- Run `php artisan key:generate`

- Install dependencies with `Composer` :
  ```bash
  $ composer install
  ```
- Create two databases one for app (e.g api) and one for app testing (e.g api_testing).  
- Install front-end dependencies with `npm`:
  ```bash
  $ npm install && npm run dev
  ``` 
- Run `php artisan migrate --seed`, this will create a user for testing. 
  You can use `email: test@gmail.com`, `pwd: secret`

- Run `php artisan passport:install`.
Note client_id & client_secret provided. it will required to get API authorizations from `/api/docs` endpoint

- Run `php artisan import-customers:csv` to import customers from customers.csv file.
NB: latitude & longitude will be fill from Google map API

- To run the tests use `Make sure update the .env.testing file`:   
  ```bash
  $ php artisan test
  ```

 ### DEMO
 - SPA Demo
 ![SPA Demo](https://user-images.githubusercontent.com/7965394/147863744-d8094c4b-f333-4357-b5d7-69db888a09bb.gif) 

- Import customers commande
 ![Import customers](https://user-images.githubusercontent.com/7965394/147863547-4500177c-d522-412a-9d61-416b3eaf35d6.png) 

- API Documentation (`/api/docs`)
 ![API Documentation](https://user-images.githubusercontent.com/7965394/147863688-126094d8-9288-4857-a4a0-54616e4c1074.gif) 
