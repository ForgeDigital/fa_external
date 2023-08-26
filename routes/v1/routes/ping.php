<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Ping\PingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ping'], function () {
    Route::get(uri: '', action: PingController::class)->name(name: 'ping');
});
