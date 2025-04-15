<?php declare(strict_types=1);

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\DateServiceProvider::class,
    App\Providers\EloquentServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RequestServiceProvider::class,
    App\Providers\RouteServiceProvider::class,

    Spatie\JsonApiPaginate\JsonApiPaginateServiceProvider::class,
];
