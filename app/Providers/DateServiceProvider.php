<?php declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

final class DateServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->setCarbonImmutableAsDefault();
    }

    private function setCarbonImmutableAsDefault(): void
    {
        Date::use(CarbonImmutable::class);
    }
}
