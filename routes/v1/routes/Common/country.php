<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'countries'], function () {
    Route::get('', \App\Http\Controllers\Countries\CountriesCollectionController::class)->name('countries.index');
    Route::get('{country}', \App\Http\Controllers\Countries\CountriesController::class)->name('countries.show')->whereUuid('country');
});
