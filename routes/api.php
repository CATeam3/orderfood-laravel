<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\CheckAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["middleware" => 'check.token'], function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login')->name('api-login');
        Route::post('register', 'register')->name('api-register');
    });
});

Route::group(["middleware" => 'auth:sanctum'], function () {

    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('api-logout');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'show')->name('api-user');
        Route::patch('user/update', 'update')->name('api-user.update');
    });

    Route::controller(MenuController::class)->group(function () {
        Route::get('menu', 'index')->name('api-menu.index');
    });

    Route::controller(OrderController::class)->group(function () {
       Route::post('order/new', 'store')->name('api-order.store');
       Route::get('order/show', 'show')->name('api-order.show');
    });


    Route::controller(CheckAuth::class)->group(function () {
        Route::get('/tokencheck', 'index')->name('api-checkauth.index');
    });

});
