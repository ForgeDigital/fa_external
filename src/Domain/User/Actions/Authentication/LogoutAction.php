<?php

namespace Domain\User\Actions\Authentication;

class LogoutAction
{
    public function execute(): void
    {
        auth()->guard(name: 'user')->logout();
    }
}
