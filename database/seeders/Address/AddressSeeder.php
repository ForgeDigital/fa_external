<?php

declare(strict_types=1);

namespace Database\Seeders\Address;

use App\Models\Address\Address;
use Database\Seeders\Traits\ForeignKeyChecks;
use Database\Seeders\Traits\TruncateTAble;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    use TruncateTAble, ForeignKeyChecks;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable('addresses');
        Address::factory(10)->create();
    }
}
