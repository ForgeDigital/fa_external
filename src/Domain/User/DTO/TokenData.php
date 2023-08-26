<?php

declare(strict_types=1);

namespace Domain\User\DTO;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public function __construct(
        public readonly ?int $user_id,
        public readonly ?int $token,
        public readonly ?string $token_expiration_date,
        public readonly ?bool $is_verified,
    ) {
    }
}
