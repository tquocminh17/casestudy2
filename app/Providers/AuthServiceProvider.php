<?php

declare(strict_types=1);

namespace App\Providers;

use App\Enums\RoleName;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Sanctum\Sanctum;

final class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->changeDefaultSanctumModel();
    }

    public function boot(): void
    {
        $this->registerPolicies();

        Gate::before(fn (User $user) => $user->hasRole(RoleName::SuperAdmin->value) ? true : null);
    }

    private function changeDefaultSanctumModel(): void
    {
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
    }
}
