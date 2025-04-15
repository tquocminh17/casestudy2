<?php

declare(strict_types=1);

namespace App\Actions\Authentication\IssueAccessToken;

use App\Events\AccessTokenIssued;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Hashing\Hasher;

final class Action
{
    public function __construct(
        private readonly Dispatcher $eventDispatcher,
        private readonly Hasher $hasher,
    ) {}

    /**
     * @throws AuthenticationException
     */
    public function execute(ActionOptions $options): ActionResponse
    {
        $user = $this->user($options);

        if (! $user || $user->password === null || ! $this->hasher->check($options->password, $user->password)) {
            throw new AuthenticationException('Invalid credentials');
        }

        $token = $user->createToken(
            "{$user->name} Personal Access Token",
            expiresAt: $options->tokenExpiresAt,
        );

        throw_unless($token->accessToken instanceof PersonalAccessToken, 'Token is not an instance of PersonalAccessToken');

        $this->eventDispatcher->dispatch(
            new AccessTokenIssued($user, $token->accessToken)
        );

        return new ActionResponse($user, $token);
    }

    private function user(ActionOptions $options): ?User
    {
        return User::query()
            ->where('email', $options->email)
            ->first();
    }
}
