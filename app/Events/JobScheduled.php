<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\User;
use Junges\Kafka\Message\Message;

final class JobScheduled extends EventLog
{
    public function __construct(
        public readonly User $user,
        public readonly Message $message,
    ) {
        parent::__construct($user);
    }

    public function message(): string
    {
        return 'Job has been scheduled.';
    }

    public function context(): array
    {
        return [
            'message_payload' => $this->message->getBody(),
        ];
    }
}
