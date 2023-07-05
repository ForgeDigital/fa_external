<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Addresses\AddressesRepository;
use App\Repositories\Addresses\AddressesRepositoryInterface;
use App\Repositories\Countries\CountriesRepository;
use App\Repositories\Countries\CountriesRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CountriesRepositoryInterface::class, CountriesRepository::class);
        $this->app->bind(AddressesRepositoryInterface::class, AddressesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
