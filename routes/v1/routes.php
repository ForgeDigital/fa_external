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

//
//// Loading route files
//Route::group([], function(){
//
//    // Iterate through each folder
//    $dirIterator = new RecursiveDirectoryIterator(__DIR__ . '/');
//
//    /** @var RecursiveDirectoryIterator | RecursiveIteratorIterator $recursive */
//    $recursive = new RecursiveIteratorIterator($dirIterator);
//
//    while ($recursive->valid()){
//        if (!$recursive->isDot() && $recursive->isDir() && $recursive->isFile() && $recursive->isReadable() && $recursive->current()->getExtension() === 'php'){
//            require $recursive->key();
//        }
//
//        $recursive->next();
//    }
//});
