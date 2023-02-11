<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $models = [
            #Master Data
            'MasterData\Category',
            'MasterData\Product',
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Repositories\Contracts\\{$model}Interface", "App\Repositories\\{$model}Repository");
        }
    }
}
