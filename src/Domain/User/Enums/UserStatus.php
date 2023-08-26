<?php

declare(strict_types=1);

namespace Domain\User\Enums;

enum UserStatus: string
{
    case Active = 'active';
    case Pending = 'pending';
    case Suspended = 'suspended';
    case Blocked = 'blocked';
}
