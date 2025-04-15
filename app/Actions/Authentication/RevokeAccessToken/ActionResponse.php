<?php

declare(strict_types=1);

namespace App\Actions\Authentication\RevokeAccessToken;

use App\Models\PersonalAccessToken;

final class ActionResponse
{
    public function __construct(
        public readonly PersonalAccessToken $token
    ) {}
}
