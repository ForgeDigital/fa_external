<?php

declare(strict_types=1);

use App\Http\Controllers\Customers\Address\CreateAddressController;
use App\Http\Controllers\Customers\Address\GetAddressController;
use App\Http\Controllers\Customers\Authentication\LoginController;
use App\Http\Controllers\Customers\Authentication\LogoutController;
use App\Http\Controllers\Customers\Profile\ProfileController;
use App\Http\Controllers\Customers\Registration\RegistrationController;
use App\Http\Controllers\Customers\Registration\TokenController;
use App\Http\Controllers\Customers\Registration\VerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(uri: 'registration', action: RegistrationController::class)->name(name: 'registration');
        Route::post(uri: 'token', action: TokenController::class)->name(name: 'token');
        Route::post('verification', action: VerificationController::class)->name('verification');

        Route::post(uri: 'login', action: LoginController::class)->name(name: 'login');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get(uri: 'profile', action: ProfileController::class)->name(name: 'show');
        Route::post(uri: 'logout', action: LogoutController::class)->name(name: 'logout');

        // Address
        Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {
            Route::post(uri: '', action: CreateAddressController::class)->name(name: 'create');
            Route::get(uri: '', action: GetAddressController::class)->name(name: 'show');
        });
    });
});
