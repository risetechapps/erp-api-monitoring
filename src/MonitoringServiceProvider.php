<?php

namespace RiseTech\Monitoring;

use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use RiseTech\Monitoring\Http\Middleware\DisableMonitoringMiddleware;
use RiseTech\Monitoring\Repository\Contracts\MonitoringRepositoryInterface;
use RiseTech\Monitoring\Repository\MonitoringRepository;
use RiseTech\Monitoring\Services\BatchIdService;

class MonitoringServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {

        app('router')->aliasMiddleware('monitoring.disable', DisableMonitoringMiddleware::class);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        Monitoring::start($this->app);

        Event::listen(RequestHandled::class, function () {
            Monitoring::flushAll();
        });

    }

    /**
     * Register the application services.
     */
    public function register(): void
    {

        $this->app->bind(MonitoringRepositoryInterface::class, function ($app) {
            // Passe a conexão desejada aqui
            return new MonitoringRepository(env('DB_CONNECTION', 'mysql'));
        });

        $this->app->singleton('monitoring', function () {
            return new Monitoring(app(MonitoringRepositoryInterface::class));
        });

        $this->app->singleton(BatchIdService::class, function ($app) {
            return new BatchIdService();
        });
    }
}
