<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers'], function () {
    Route::post('registration', \App\Http\Controllers\Customers\Registration\RegistrationController::class)->name('customers.registration');
    Route::get('{customer}/profile', \App\Http\Controllers\Customers\Profile\ProfileController::class)->name('customers.show')->whereUuid('customer');
});
