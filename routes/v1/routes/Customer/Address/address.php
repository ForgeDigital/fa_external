<?php

declare(strict_types=1);

use App\Http\Controllers\Customers\Address\CreateAddressController;
use App\Http\Controllers\Customers\Address\GetAddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/addresses', 'as' => 'customers.addresses'], function () {
    // Unprotected routes
    Route::group([], function () {
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::post(uri: 'create', action: CreateAddressController::class)->name(name: 'create');
        Route::get(uri: '', action: GetAddressController::class)->name(name: 'show');
    });
});
