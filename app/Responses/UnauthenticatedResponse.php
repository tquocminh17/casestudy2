<?php

declare(strict_types=1);

namespace App\Responses;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class UnauthenticatedResponse implements Responsable
{
    public function __construct(
        private readonly AuthenticationException $exception,
    ) {}

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            [
                'message' => $this->exception->getMessage(),
            ],
            SymfonyResponse::HTTP_UNAUTHORIZED
        );
    }
}
