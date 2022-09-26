<?php

namespace Marcionunes\Conship;

use Illuminate\Support\ServiceProvider;
use Marcionunes\Conship\CommandConshipGenerator;

class ConshipServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->publishes([
            __DIR__ . '/config/conship.php' => config_path('conship.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands(CommandConshipGenerator::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/conship.php',
            'conship'
        );
    }
}
