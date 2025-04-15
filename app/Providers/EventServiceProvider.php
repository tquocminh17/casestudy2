<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\Contracts\EventLoggable;
use App\Listeners\Loggable\EventLogListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as BaseServiceProvider;

final class EventServiceProvider extends BaseServiceProvider
{
    /**
     * @var array<string, array<int, string>>
     */
    protected $listen = [
        EventLoggable::class => [
            EventLogListener::class,
        ],
    ];
}
