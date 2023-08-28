<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Authentication\LoginController;
use App\Http\Controllers\V1\User\Authentication\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/authentication', 'as' => 'users.authentication.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(
            uri: 'login',
            action: LoginController::class
        )->name(
            name: 'login'
        );
    });

    // Protected routes
    Route::group(['middleware' => 'auth:user'], function () {
        Route::post(
            uri: 'logout',
            action: LogoutController::class
        )->name(
            name: 'logout'
        );
    });
});
