<?php

declare(strict_types=1);

namespace Database\Seeders\User;

use Database\Seeders\Traits\TruncateTable;
use Domain\User\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->truncateTable(table: 'users');
        User::factory(count: 50)->create();
    }
}
