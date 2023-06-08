<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'customers'], function () {
    Route::get('{customer}', \App\Http\Controllers\Customer\CustomerController::class)->name('customers.show')->whereUuid('customer');
});
