<?php

namespace Airo\Alert;

use Illuminate\Support\ServiceProvider;

class AlertServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'alert');

        $this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor/notify'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../components' => base_path('resources/js/components/'),
        ], 'components');
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('airo.alert', function () {
            return $this->app->make('Airo\Alert\AlertNotifier');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'airo.alert',
        ];
    }
}