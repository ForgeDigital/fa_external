<?php

declare(strict_types=1);

namespace App\Models\Customer;

use App\Models\Traits\HasPassword;
use App\Models\Traits\HasUuid;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends User
{
    use HasFactory, SoftDeletes, HasUuid, HasPassword;

    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }
}
