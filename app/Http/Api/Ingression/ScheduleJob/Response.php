<?php declare(strict_types=1);

namespace App\Http\Api\Ingression\ScheduleJob;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class Response implements Responsable
{
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse([
            //
        ], SymfonyResponse::HTTP_ACCEPTED);
    }
}
