<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group([], function () {
    // Iterate through each folder
    $dirIterator = new RecursiveDirectoryIterator(__DIR__.'/routes');

    /** @var RecursiveDirectoryIterator | RecursiveIteratorIterator $recursive */
    $recursive = new RecursiveIteratorIterator($dirIterator);

    while ($recursive->valid()) {
        if (! $recursive->isDot()
            && $recursive->isFile()
            && $recursive->isReadable()
            && $recursive->current()->getExtension() === 'php') {
            require $recursive->key();
        }

        $recursive->next();
    }
});
