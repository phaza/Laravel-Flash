<?php

namespace DraperStudio\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind(
            'DraperStudio\Flash\Contracts\SessionStore',
            'DraperStudio\Flash\Sessions\LaravelSessionStore'
        );

        $this->app->bindShared('flash', function () {
            return $this->app->make('DraperStudio\Flash\FlashNotifier');
        });
    }

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
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['flash'];
    }
}
