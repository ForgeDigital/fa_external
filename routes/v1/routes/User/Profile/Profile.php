<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Profile\FetchProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/profile', 'as' => 'users.'], function () {
    // Unprotected routes
    Route::group([], function () {
    });

    // Protected routes
    Route::group(['middleware' => 'auth:user'], function () {
        Route::get(
            uri: 'fetch',
            action: FetchProfileController::class
        )->name(
            name: 'profile.fetch'
        );
    });
});
