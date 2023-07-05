<?php

namespace Database\Seeders;

use Database\Seeders\Addresses\AddressesSeeder;
use Database\Seeders\Countries\CountriesTableSeeder;
use Database\Seeders\Customers\CustomersSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountriesTableSeeder::class);
//        $this->call(AddressesSeeder::class);
//        $this->call(CustomersSeeder::class);
    }
}
