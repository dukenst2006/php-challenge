<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\RegisterController;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

Route::middleware('auth:api')->group(function () {
    Route::post('user/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('customers', CustomerController::class);
    //->middleware('client')
});
