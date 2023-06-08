<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ping'], function () {
    Route::get('', \App\Http\Controllers\V1\Ping\PingController::class)->name('ping');
});
