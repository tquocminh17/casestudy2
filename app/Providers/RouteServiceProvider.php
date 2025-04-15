<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureRateLimiting();
    }

    public function map(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    private function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            /** @var int $rateLimit */
            $rateLimit = config('rate-limits.per_minute_by_user');

            return Limit::perMinute($rateLimit)->by($request->user()?->id ?: $request->ip());
        });
    }
}
