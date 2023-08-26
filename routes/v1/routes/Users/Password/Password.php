<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Password\Reset\PasswordResetRequestController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/password', 'as' => 'user.password.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(
            uri: 'reset/request',
            action: PasswordResetRequestController::class
        )->name(
            name: 'reset.request'
        );
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
    });
});
