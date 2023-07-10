<?php

declare(strict_types=1);

namespace App\Models\Address;

use App\Models\Customer\Customer;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes, HasUuid;

    protected $guarded = ['id'];

    public $incrementing = false;

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
