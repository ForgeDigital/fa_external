<?php

declare(strict_types=1);

namespace Domain\User\DTO;

use Spatie\LaravelData\Data;

class AddressData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?int $user_id,

        public readonly ?string $address,
        public readonly ?string $city,
        public readonly ?string $state,
        public readonly ?string $code,

        public readonly ?string $longitude,
        public readonly ?string $latitude,
    ) {
    }
}
