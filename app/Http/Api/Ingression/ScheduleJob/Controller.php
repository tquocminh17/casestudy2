<?php declare(strict_types=1);

namespace App\Http\Api\Ingression\ScheduleJob;

use App\Actions\Ingression\ScheduleJob;

class Controller
{
    public function __construct(
        private readonly ScheduleJob\Action $scheduleJobAction,
    ) {}

    public function __invoke(Request $request): Response
    {
        $this->scheduleJobAction->execute(
            new ScheduleJob\ActionOptions(
                user: $request->userOrFail(),
                type: $request->type(),
                templateId: $request->templateId(),
                templateVars: $request->templateVars(),
                scheduledAt: $request->scheduledAt(),
            )
        );

        return new Response;
    }
}
