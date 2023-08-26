<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Address\CreateAddressController;
use App\Http\Controllers\V1\User\Address\FetchAddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/addresses', 'as' => 'users.addresses.'], function () {
    // Unprotected routes
    Route::group([], function () {
    });

    // Protected routes
    Route::group(['middleware' => 'auth:user'], function () {
        Route::post(
            uri: 'create',
            action: CreateAddressController::class
        )->name(
            name: 'create'
        );

        Route::get(
            uri: '',
            action: FetchAddressController::class
        )->name(
            name: 'fetch'
        );
    });
});
