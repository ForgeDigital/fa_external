<?php

declare(strict_types=1);

namespace Database\Seeders\Country;

use App\Models\Country\Country;
use Database\Seeders\Traits\ForeignKeyChecks;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
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
