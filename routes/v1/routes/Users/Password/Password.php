<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Password\Reset\PasswordResetController;
use App\Http\Controllers\V1\User\Password\Reset\PasswordResetRequestController;
use App\Http\Controllers\V1\User\Password\Reset\PasswordResetTokenVerificationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/password/reset', 'as' => 'user.password.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(
            uri: 'request',
            action: PasswordResetRequestController::class
        )->name(
            name: 'reset.request'
        );
        Route::post(
            uri: 'token/verification',
            action: PasswordResetTokenVerificationController::class
        )->name(
            name: 'reset.token.verification'
        );
        Route::post(
            uri: '',
            action: PasswordResetController::class
        )->name(
            name: 'reset'
        );
    });

    // Protected routes
    Route::group(['middleware' => 'auth:customer'], function () {
    });
});
