<?php

declare(strict_types=1);

namespace App\Models\Customer;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    use HasFactory, HasUuid;

    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
