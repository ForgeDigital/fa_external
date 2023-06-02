<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('', \App\Http\Controllers\Country\CollectionController::class)->name('countries');
