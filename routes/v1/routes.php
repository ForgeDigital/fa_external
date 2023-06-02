<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api_key'], function () {
    // Ping Route
    Route::prefix('ping')->group(base_path('routes/v1/ping/ping.php'));

    // Country resource
    Route::prefix('countries')->group(base_path('routes/v1/country/country.php'));
});
