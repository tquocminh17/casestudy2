<?php declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\PermissionName;
use App\Enums\RoleName;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
        $this->createTestAdmin();
    }

    private function createRoles(): void
    {
        $allRoleNames = Role::pluck('name');
        $newRoleNames = collect(RoleName::values())->diff($allRoleNames);

        $newRoleNames->each(function (string $roleName) {
            Role::create(['name' => $roleName]);
        });
    }

    private function createPermissions(): void
    {
        foreach (PermissionName::cases() as $name) {
            Permission::firstOrCreate([
                'name' => $name->value,
            ]);
        }
    }

    private function createTestAdmin(): void
    {
        $user = User::updateOrCreate(
            ['email' => config('auth.default_account.email')],
            [
                'name' => 'Test Super Admin',
                'password' => Hash::make(config('auth.default_account.password')),
                'email_verified_at' => now(),
            ]
        );

        $superRole = Role::findByName(RoleName::SuperAdmin->value);
        $user->assignRole($superRole);
    }
}
