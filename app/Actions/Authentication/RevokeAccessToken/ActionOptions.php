<?php

declare(strict_types=1);

namespace App\Actions\Authentication\RevokeAccessToken;

use App\Models\PersonalAccessToken;
use App\Models\User;

final class ActionOptions
{
    public function __construct(
        public readonly User $initiator,
        public readonly PersonalAccessToken $token
    ) {}
}
