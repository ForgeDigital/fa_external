<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repository\Address\AddressRepository;
use App\Repository\Address\AddressRepositoryInterface;
use App\Repository\Country\CountryRepository;
use App\Repository\Country\CountryRepositoryInterface;
use App\Repository\Customer\CustomerRepository;
use App\Repository\Customer\CustomerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
