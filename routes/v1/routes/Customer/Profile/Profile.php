<?php

declare(strict_types=1);

use App\Http\Controllers\Customers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers/profile', 'as' => 'customers.profile'], function () {
    // Unprotected routes
    Route::group([], function () {
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
        Route::get(uri: '', action: ProfileController::class)->name(name: '');
    });
});
