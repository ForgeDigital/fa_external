<?php

declare(strict_types=1);

namespace Database\Seeders\Countries;

use Database\Seeders\Traits\ForeignKeyChecks;
use Database\Seeders\Traits\TruncateTable;
use Domain\Shared\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    use TruncateTable, ForeignKeyChecks;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable('countries');
        Country::factory(10)->create();
    }
}
