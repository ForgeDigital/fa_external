<?php

declare(strict_types=1);

namespace Database\Seeders\Customer;

use App\Models\Customer\Customer;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable('customers');
        Customer::factory(50)->create();
    }
}
