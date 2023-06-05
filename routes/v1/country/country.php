<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('', \App\Http\Controllers\Country\CountryCollectionController::class)->name('countries.index');
Route::get('{country}', \App\Http\Controllers\Country\CountryController::class)->name('countries.show');
