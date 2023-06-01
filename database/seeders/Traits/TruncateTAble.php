<?php

declare(strict_types=1);

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait TruncateTAble
{
    protected function truncateTable($table): void
    {
        DB::table($table)->truncate();
    }
}
