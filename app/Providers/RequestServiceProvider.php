<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

final class RequestServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerModelOrFailMethods();
        $this->registerPrimitiveMethods();
    }

    private function registerModelOrFailMethods(): void
    {
        Request::macro('userOrFail', function (): User {
            $user = Auth::user();

            if (! ($user instanceof User)) {
                throw new AuthenticationException;
            }

            return $user;
        });
    }

    private function registerPrimitiveMethods(): void
    {
        Request::macro('immutableDate', function (string $key, ?string $timezone = null): CarbonImmutable {
            $value = request()->string($key)->value();

            return CarbonImmutable::make($value, $timezone) ?? throw new InvalidArgumentException('Invalid date format');
        });
    }
}
