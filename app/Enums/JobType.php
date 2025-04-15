<?php declare(strict_types=1);

namespace App\Enums;

/**
 * Enum representing different types of jobs that can be scheduled. (Optionally stored in a database)
 */
enum JobType: string
{
    case ResetPassword = 'reset_password';
    case VerifyEmail = 'verify_email';
    case Newsletter = 'newsletter';
    case OpenEmail = 'open_email';

    /**
     * Assuming this is fetched from a database or some other source.
     */
    public function priority(): int
    {
        return match ($this) {
            self::ResetPassword, self::VerifyEmail => 1,
            self::Newsletter => 2,
            self::OpenEmail => 3,
        };
    }
}
