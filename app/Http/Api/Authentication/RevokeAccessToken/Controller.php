<?php

declare(strict_types=1);

namespace App\Http\Api\Authentication\RevokeAccessToken;

use App\Actions\Authentication\RevokeAccessToken;
use App\Models\PersonalAccessToken;

final class Controller
{
    public function __construct(
        private readonly RevokeAccessToken\Action $revokeAccessToken
    ) {}

    public function __invoke(Request $request): Response
    {
        $user = $request->userOrFail();
        /** @var PersonalAccessToken $token */
        $token = $user->currentAccessToken();

        $this->revokeAccessToken->execute(
            new RevokeAccessToken\ActionOptions($user, $token)
        );

        return new Response;
    }
}
