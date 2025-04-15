<?php declare(strict_types=1);

namespace App\Policies;

use App\Enums\PermissionName;
use App\Models\User;
use Illuminate\Auth\Access\Response;

final class UserPolicy
{
    public function scheduleJobs(User $user): Response
    {
        if (! $user->hasPermissionTo(PermissionName::JobSchedule->value)) {
            return Response::deny('The user does not have permission to do that.');
        }

        return Response::allow();
    }
}
