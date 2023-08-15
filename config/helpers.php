<?php

declare(strict_types=1);

use Illuminate\Support\Facades\DB;

function generateToken(string $table, int $length): string
{
    $number = '';
    do {
        for ($i = $length; $i--; $i > 0) {
            $number .= mt_rand(1, 9);
        }
    } while (! empty(DB::table($table)->where(column: 'token', operator: $number)->first(['token'])));

    return $number;
}
