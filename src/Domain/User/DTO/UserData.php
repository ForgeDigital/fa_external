<?php

namespace Domain\User\DTO;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?string $resource_id,

        public readonly ?string $first_name,
        public readonly ?string $middle_name,
        public readonly ?string $last_name,

        public readonly ?string $gender,
        public readonly ?Carbon $dob,

        public readonly ?string $phone,
        public readonly ?string $email,

        public readonly ?string $avatar,

        public readonly ?string $status,

        public readonly ?Carbon $created_at,
        public readonly ?Carbon $updated_at,
    ) {
    }
}
