<?php

namespace DraperStudio\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'flash');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/flash'),
            __DIR__.'/../config/flash.php' => config_path('flash.php'),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('flash', function () {
            return $this->app->make(FlashNotifier::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['flash'];
    }
}
