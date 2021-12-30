<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CustomerController;

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
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::post('password/email', [UserController::class, 'forgot']);
});

Route::middleware('auth:api')->group(function () {
    Route::get('user/logout', [UserController::class, 'logout']);
    // Route::resource('customers', CustomerController::class)->middleware('client');
});

Route::resource('customers', CustomerController::class);
