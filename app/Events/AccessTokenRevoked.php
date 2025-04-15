<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

final class AccessTokenRevoked extends EventLog
{
    public function __construct(
        User $initiator,
        public readonly PersonalAccessToken $token,
    ) {
        parent::__construct($initiator);
    }

    public function message(): string
    {
        return 'Access token revoked.';
    }

    public function context(): array
    {
        return [
            'id' => $this->token->id,
        ];
    }
}
