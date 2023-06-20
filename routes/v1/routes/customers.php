<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post('registration', \App\Http\Controllers\Customers\Registration\RegistrationController::class)->name('registration');
        Route::post('login', \App\Http\Controllers\Customers\Authentication\LoginController::class)->name('login');
    });

    // Protected routes
    Route::group(['middleware' => 'auth:staff'], function () {
        Route::get('profile', \App\Http\Controllers\Customers\Profile\ProfileController::class)->name('show');
        Route::post('logout', \App\Http\Controllers\Customers\Authentication\LogoutController::class)->name('logout');
    });
});
