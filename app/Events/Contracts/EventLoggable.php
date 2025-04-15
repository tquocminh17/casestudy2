<?php

declare(strict_types=1);

namespace App\Events\Contracts;

interface EventLoggable
{
    public function message(): string;

    /**
     * @return array<string, mixed>
     */
    public function context(): array;
}
