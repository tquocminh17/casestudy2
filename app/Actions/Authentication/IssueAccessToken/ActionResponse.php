<?php

declare(strict_types=1);

namespace App\Actions\Authentication\IssueAccessToken;

use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

final class ActionResponse
{
    public function __construct(
        public readonly User $user,
        public readonly NewAccessToken $token
    ) {}
}
