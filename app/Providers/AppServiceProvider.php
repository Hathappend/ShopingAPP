<?php

namespace App\Providers;

use App\Services\Admin\Impl\ProfileServiceImpl;
use App\Services\Admin\ProfileService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ProfileService::class => ProfileServiceImpl::class
    ];

    public function provides(): array
    {
        return [ProfileService::class];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
