<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\PersonalAccessToken;
use App\Models\User;

final class AccessTokenIssued extends EventLog
{
    public function __construct(
        public readonly User $user,
        public readonly PersonalAccessToken $token,
    ) {
        parent::__construct($user);
    }

    public function message(): string
    {
        return 'Access token issued.';
    }

    public function context(): array
    {
        return [
            'token_id' => $this->token->id,
        ];
    }
}
