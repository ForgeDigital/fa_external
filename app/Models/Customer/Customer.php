<?php

declare(strict_types=1);

namespace App\Models\Customer;

use App\Models\Traits\HasPassword;
use App\Models\Traits\HasUuid;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

//class Customer extends User
class Customer extends Model implements JWTSubject
{
    use HasFactory, SoftDeletes, HasUuid, HasPassword;

    protected $guarded = ['id'];

    public function getRouteKeyName(): string
    {
        return 'resource_id';
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
