<?php

declare(strict_types=1);

namespace App\Events;

use App\Events\Contracts\EventLoggable;
use App\Models\User;

abstract class EventLog implements EventLoggable
{
    public function __construct(
        public User $initiator,
    ) {}

    abstract public function message(): string;

    /**
     * @return array<string, mixed>
     */
    abstract public function context(): array;
}
