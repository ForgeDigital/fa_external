<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Common\Country\CountryCollectionController;
use App\Http\Controllers\V1\Common\Country\FetchCountryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'countries', 'as' => 'countries.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::get(
            uri: '',
            action: CountryCollectionController::class
        )->name(
            name: 'collection'
        );
    });

    // Protected routes
    Route::group(['middleware' => 'auth:user'], function () {
        Route::get(
            uri: '{country}',
            action: FetchCountryController::class
        )->name(
            name: 'fetch'
        )->whereUuid(
            parameters: 'country'
        );
    });
});
