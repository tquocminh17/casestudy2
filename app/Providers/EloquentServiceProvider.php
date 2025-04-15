<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

final class EloquentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Model::shouldBeStrict();
    }
}
