<?php declare(strict_types=1);

namespace App\Actions\Ingression\ScheduleJob;

use App\Events\JobScheduled;
use Illuminate\Contracts\Events\Dispatcher;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class Action
{
    public function __construct(
        private readonly Dispatcher $eventDispatcher,
    ) {}

    public function execute(ActionOptions $options): void
    {
        $message = new Message(
            body: [
                'user_id' => $options->user->id,
                'job_type' => $options->type->value,
                'priority' => $options->type->priority(),
                'template_id' => $options->templateId,
                'template_vars' => $options->templateVars,
                'scheduled_at' => $options->scheduledAt,
            ],
        );

        Kafka::asyncPublish()
            ->onTopic($this->topic())
            ->withMessage($message)
            ->send();

        $this->eventDispatcher->dispatch(
            new JobScheduled($options->user, $message)
        );
    }

    private function topic(): string
    {
        /** @var string */
        return config('kafka.topics.ingression');
    }
}
