<?php

declare(strict_types=1);

use App\Http\Controllers\V1\User\Registration\ActivationController;
use App\Http\Controllers\V1\User\Registration\NewTokenController;
use App\Http\Controllers\V1\User\Registration\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users/registration', 'as' => 'users.registration.'], function () {
    // Unprotected routes
    Route::group([], function () {
        Route::post(
            uri: '',
            action: RegistrationController::class
        )->name(
            name: 'register'
        );

        Route::post(
            uri: 'token/new',
            action: NewTokenController::class
        )->name(
            name: '.token.new'
        );

        Route::post(
            uri: 'activation',
            action: ActivationController::class
        )->name(
            name: '.activation'
        );
    });

    // Protected routes
    Route::group(['middleware' => 'auth:user'], function () {
    });
});
