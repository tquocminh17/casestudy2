<?php

declare(strict_types=1);

namespace App\Http\Api\Authentication\IssueAccessToken;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\NewAccessToken;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

final class Response implements Responsable
{
    public function __construct(
        private readonly NewAccessToken $token
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse([
            'data' => [
                'token' => $this->token->plainTextToken,
            ],
        ], SymfonyResponse::HTTP_CREATED);
    }
}
