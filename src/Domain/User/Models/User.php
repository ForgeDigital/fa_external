<?php

declare(strict_types=1);

namespace Domain\User\Models;

use Domain\Shared\Models\Traits\HasPassword;
use Domain\Shared\Models\Traits\HasUuid;
use Domain\User\DTO\UserData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, ShouldQueue
{
    use HasFactory, SoftDeletes, Notifiable, HasUuid, HasPassword;

    protected $guarded = ['id'];

    protected $guard = 'user';

    protected $casts = [
    ];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    public function address(): HasOne
    {
        return $this->hasOne(related: Address::class, foreignKey: 'user_id');
    }

    public function token(): HasOne
    {
        return $this->hasOne(related: Token::class, foreignKey: 'user_id');
    }

    public function toData(): UserData
    {
        return new UserData(
            id: $this->id,
            resource_id: $this->resource_id,
            first_name: $this->first_name,
            middle_name: $this->middle_name,
            last_name: $this->last_name,

            gender: $this->gender,
            dob: $this->dob,

            phone: $this->phone,
            email: $this->email,

            avatar: $this->avatar,

            status: $this->status,

            created_at: $this->created_at,
            updated_at: $this->updated_at
        );
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
