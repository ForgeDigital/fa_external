<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
    Route::post('registration', \App\Http\Controllers\Customers\Registration\RegistrationController::class)->name('registration');
    Route::get('{customer}/profile', \App\Http\Controllers\Customers\Profile\ProfileController::class)->name('show')->whereUuid('customer');

    // Authentication routes
    Route::group([], function () {
        Route::post('login', \App\Http\Controllers\Customers\Authentication\LoginController::class)->name('login');
    });
});
