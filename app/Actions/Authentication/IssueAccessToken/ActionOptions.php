<?php

declare(strict_types=1);

namespace App\Actions\Authentication\IssueAccessToken;

use Carbon\CarbonImmutable;

final class ActionOptions
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly ?CarbonImmutable $tokenExpiresAt = null
    ) {}
}
