<?php

namespace GFL\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $commands = [
         'GFL\Repository\commands\CreateRepositoryContracts',
         'GFL\Repository\commands\CreateRepositoryEloquents',
         'GFL\Repository\commands\CreateRepository'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands($this->commands);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       
    }
}
