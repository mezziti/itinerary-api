<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\AdminController;
use App\Http\Controllers\v1\SellerController;
use App\Http\Controllers\v1\CountryController;

Route::group(['middleware' => ['api', 'checkApiPassword']], function ($router) {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    Route::get('/countries', [CountryController::class, 'index']);

});

Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!']);
});
