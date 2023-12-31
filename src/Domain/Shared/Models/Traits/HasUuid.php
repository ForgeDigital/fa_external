<?php

declare(strict_types=1);

namespace Domain\Shared\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(fn (Model $model) => $model->resource_id = Str::uuid()->toString());
    }
}
