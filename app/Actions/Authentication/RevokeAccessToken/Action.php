<?php

declare(strict_types=1);

namespace App\Actions\Authentication\RevokeAccessToken;

use App\Events\AccessTokenRevoked;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Events\Dispatcher;

final class Action
{
    public function __construct(
        private readonly Dispatcher $eventDispatcher,
    ) {}

    /**
     * @throws AuthenticationException
     */
    public function execute(ActionOptions $options): ActionResponse
    {
        $token = $options->token;

        $token->delete();

        $this->eventDispatcher->dispatch(
            new AccessTokenRevoked($options->initiator, $token)
        );

        return new ActionResponse($token);
    }
}
