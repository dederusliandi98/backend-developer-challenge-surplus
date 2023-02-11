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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $models = [
            #Master data
            'MasterData\Category',
            'MasterData\Product',
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Services\Contracts\\{$model}Interface", "App\Services\\{$model}Service");
        }
    }
}
