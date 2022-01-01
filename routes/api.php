<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\CustomerController;
use App\Http\Controllers\API\v1\LoginController;
use App\Http\Controllers\API\v1\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', [LoginController::class, 'login'])->name('login');
        Route::post('register', [RegisterController::class, 'register'])->name('register');
    });

    Route::middleware('auth:api')->group(function () {
        Route::post('user/logout', [LoginController::class, 'logout'])->name('logout');
        Route::resource('customers', CustomerController::class);
    });
});
