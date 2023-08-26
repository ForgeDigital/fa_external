<?php

declare(strict_types=1);

namespace Domain\User\Models;

use Domain\Shared\Models\Traits\HasUuid;
use Domain\User\DTO\AddressData;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    public function toData(): AddressData
    {
        return new AddressData(
            id: $this->id,
            user_id: $this->user_id,

            address: $this->address,
            city: $this->city,
            state: $this->state,
            code: $this->code,

            longitude: $this->longitude,
            latitude: $this->latitude,
        );
    }
}
