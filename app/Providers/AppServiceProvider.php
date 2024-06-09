<?php

namespace App\Providers;

use App\Services\Admin\HomeSlideService;
use App\Services\Admin\Impl\HomeSlideServiceImpl;
use App\Services\Admin\Impl\ProfileServiceImpl;
use App\Services\Admin\ProfileService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ProfileService::class => ProfileServiceImpl::class,
        HomeSlideService::class => HomeSlideServiceImpl::class
    ];

    public function provides(): array
    {
        return [
            ProfileService::class,
            HomeSlideService::class
        ];
    }

    private function registerServices(array $services): void
    {
        foreach ($services as $service) {
            $this->app->bind($service, function ($app) use ($service){
                return $this->app->make($service);
            });
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerServices([
            ProfileService::class,
            HomeSlideService::class
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
