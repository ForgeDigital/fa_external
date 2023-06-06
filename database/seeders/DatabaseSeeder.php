<?php

namespace Database\Seeders;

use Database\Seeders\Address\AddressSeeder;
use Database\Seeders\Country\CountryTableSeeder;
use Database\Seeders\Customer\CustomerSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountryTableSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(CustomerSeeder::class);
    }
}
