<?php

declare(strict_types=1);

namespace App\Listeners\Loggable;

use App\Events\EventLog;
use Psr\Log\LoggerInterface;

class EventLogListener
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {}

    public function handle(EventLog $event): void
    {
        $context = array_merge(
            $event->context(),
            [
                'initiator_id' => $event->initiator->id,
            ],
        );

        $this->logger->info($event->message(), $context);
    }
}
