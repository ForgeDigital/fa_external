<?php

declare(strict_types=1);

use App\Http\Controllers\Customers\Registration\ActivationController;
use App\Http\Controllers\Customers\Registration\RegistrationController;
use App\Http\Controllers\Customers\Registration\TokenController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/registration', 'as' => 'customers.registration'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(uri: '', action: RegistrationController::class)->name(name: '');
        Route::post(uri: 'token', action: TokenController::class)->name(name: '.token');
        Route::post(uri: 'activation', action: ActivationController::class)->name(name: '.activation');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
    });
});
