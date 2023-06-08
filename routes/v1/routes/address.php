<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'addresses'], function () {
    Route::get('', \App\Http\Controllers\Address\AddressCollectionController::class)->name('addresses.index');
    Route::get('{address}', \App\Http\Controllers\Address\AddressController::class)->name('addresses.show')->whereUuid('address');
});
