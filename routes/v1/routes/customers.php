<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post('registration', \App\Http\Controllers\Customers\Registration\RegistrationController::class)->name('registration');
        Route::post('verification', \App\Http\Controllers\Customers\Registration\VerificationController::class)->name('verification');
        Route::post('login', \App\Http\Controllers\Customers\Authentication\LoginController::class)->name('login');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get('profile', \App\Http\Controllers\Customers\Profile\ProfileController::class)->name('show');
        Route::post('logout', \App\Http\Controllers\Customers\Authentication\LogoutController::class)->name('logout');

        // Address
        Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {
            Route::post('', \App\Http\Controllers\Customers\Address\CreateAddressController::class)->name('create');
            Route::get('', \App\Http\Controllers\Customers\Address\GetAddressController::class)->name('show');
        });
    });
});
