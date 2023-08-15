<?php

declare(strict_types=1);

use App\Http\Controllers\Customers\Authentication\LoginController;
use App\Http\Controllers\Customers\Authentication\LogoutController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/authentication', 'as' => 'customers.authentication'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(uri: 'login', action: LoginController::class)->name(name: 'login');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::post(uri: 'logout', action: LogoutController::class)->name(name: 'logout');
    });
});
