<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\Location\LocationInterface',
            'App\Repositories\Location\LocationRepository',
            'App\Repositories\Tank\TankInterface',
            'App\Repositories\Tank\TankRepository',
            'App\Repositories\ActivityLog\ActivityLogInterface',
            'App\Repositories\ActivityLog\ActivityLogRepository',
            'App\Repositories\DailyRecord\DailyRecordInterface',
            'App\Repositories\DailyRecord\DailyRecordRepository'
        );
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
