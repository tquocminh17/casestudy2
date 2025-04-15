<?php declare(strict_types=1);

namespace App\Enums;

use App\Enums\Concerns\HasValues;

enum PermissionName: string
{
    use HasValues;

    case JobSchedule = 'job.schedule';
}
