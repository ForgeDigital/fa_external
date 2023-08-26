<?php

declare(strict_types=1);

namespace Domain\User\Models;

use Domain\User\DTO\TokenData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Token extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'email',
        'token',
        'token_expiration_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id');
    }

    public function toData(): TokenData
    {
        return new TokenData(
            user_id: $this->user_id,
            token: $this->token,
            token_expiration_date: $this->token_expiration_date,
            is_verified: $this->is_verified
        );
    }
}
