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
        $this->loadViewsFrom(__DIR__ . '/../views', 'alert');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/vendor/alert'),
        ], 'views');

        $componentPath = $this->isThereAnAssetsFolderInTheResources() ?
            base_path('resources/assets/js/components') :
            base_path('resources/js/components/');

        $this->publishes([
            __DIR__ . '/../components' => $componentPath,
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

    /**
     * 是否 \resources 內有 assets 資料夾
     *
     * @return boolean
     */
    private function isThereAnAssetsFolderInTheResources()
    {
        return preg_match('/^4.*|^5\.[0-6].*/i', app()->version());
    }
}
