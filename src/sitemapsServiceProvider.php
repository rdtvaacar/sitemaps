<?php

namespace acr\sitemaps;

use Illuminate\Support\ServiceProvider;

class sitemapsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'acr');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'acr');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/config/sitemaps.php', 'sitemaps');

        // Register the service the package provides.
        $this->app->singleton('sitemaps', function ($app) {
            return new sitemaps;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sitemaps'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/config/sitemaps.php' => config_path('sitemaps.php'),
        ], 'sitemaps.config');

        // Publishing the views.
      /*  $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/acr/sitemaps'),
        ], 'sitemaps.views');*/

        // Publishing assets.
        $this->publishes([
            __DIR__ . '/views/js/sitemaps/build' => public_path('vendor/acr/sitemaps'),
        ], 'sitemaps.views');

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/acr'),
        ], 'sitemaps.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
