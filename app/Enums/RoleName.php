<?php declare(strict_types=1);

namespace App\Enums;

use App\Enums\Concerns\HasValues;

enum RoleName: string
{
    use HasValues;

    case SuperAdmin = 'Super Admin';
}
