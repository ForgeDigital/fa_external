<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    Route::post('registration', \App\Http\Controllers\Customers\Registration\RegistrationController::class)->name('registration');
    Route::post('login', \App\Http\Controllers\Customers\Authentication\LoginController::class)->name('login');

    // Authentication routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get('profile', \App\Http\Controllers\Customers\Profile\ProfileController::class)->name('show');
    });
});
