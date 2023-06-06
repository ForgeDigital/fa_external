<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'api_key'], function () {
    // Ping Route
    Route::prefix('ping')->group(base_path('routes/v1/ping/ping.php'));

    // Country resources
    Route::prefix('countries')->group(base_path('routes/v1/country/country.php'));

    // Address resources
    Route::prefix('addresses')->group(base_path('routes/v1/address/address.php'));

    // Customer resources
    Route::prefix('customers')->group(base_path('routes/v1/customer/customer.php'));
});
