<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'addresses'], function () {
    Route::get('', \App\Http\Controllers\Addresses\AddressesCollectionController::class)->name('addresses.index');
    Route::get('{address}', \App\Http\Controllers\Addresses\AddressesController::class)->name('addresses.show')->whereUuid('address');
});
