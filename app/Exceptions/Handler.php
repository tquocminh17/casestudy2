<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Responses\UnauthenticatedResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\RecordsNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use LogicException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        LogicException::class,
        RecordsNotFoundException::class,
    ];

    /**
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse|RedirectResponse|Response
    {
        return new UnauthenticatedResponse($exception)->toResponse($request);
    }
}
