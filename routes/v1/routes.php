<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// Ping Route
Route::prefix('ping')->group(base_path('routes/v1/ping/ping.php'));
