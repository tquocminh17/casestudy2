<?php declare(strict_types=1);

namespace App\Actions\Ingression\ScheduleJob;

use App\Enums\JobType;
use App\Models\User;
use Carbon\CarbonImmutable;

class ActionOptions
{
    /**
     * @param  array<string, mixed>  $templateVars
     */
    public function __construct(
        public readonly User $user,
        public readonly JobType $type,
        public readonly string $templateId,
        public readonly array $templateVars,
        public readonly CarbonImmutable $scheduledAt,
    ) {}
}
