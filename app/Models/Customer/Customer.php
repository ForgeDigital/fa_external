<?php

declare(strict_types=1);

namespace App\Models\Customer;

use App\Enums\CustomerStatus;
use App\Models\Address\Address;
use App\Models\Traits\HasPassword;
use App\Models\Traits\HasUuid;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends User
{
    use HasFactory, SoftDeletes, HasUuid, HasPassword;

    protected $guarded = ['id'];

    protected $guard = 'customer';

    protected $casts = [
        'status' => CustomerStatus::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'customer_id');
    }

    public function token(): HasOne
    {
        return $this->hasOne(Token::class, 'customer_id');
    }
}
