<?php

declare(strict_types=1);

return [
    'remove' => [
        'X-Powered-By',
        'x-powered-by',
        'Server',
        'server',
        'X-RateLimit-Limit',
        'x-ratelimit-limit',
        'X-RateLimit-Remaining',
        'x-ratelimit-remaining',
        'Date',
        'date',
    ],

    'referrer-policy' => 'no-referrer-when-downgrade',
    'strict-transport-security' => 'max-age=31536000; includeSubDomains',
    'certificate-transparency' => 'enforce, max-age=30',
    'permissions-policy' => 'autoplay=(self), camera=(), encrypted-media=(self), fullscreen=(), geolocation=(self), gyroscope=(self), magnetometer=(), microphone=(), midi=(), payment=(), sync-xhr=(self), usb=()',
    'content-type-options' => 'nosniff',
];
