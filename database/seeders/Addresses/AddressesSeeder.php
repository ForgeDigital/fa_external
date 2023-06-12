<?php

declare(strict_types=1);

namespace Database\Seeders\Addresses;

use App\Models\Address\Address;
use Database\Seeders\Traits\ForeignKeyChecks;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    use TruncateTable, ForeignKeyChecks;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable('addresses');
        Address::factory(10)->create();
    }
}