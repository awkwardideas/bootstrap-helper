<?php namespace AwkwardIdeas\BootstrapHelper;

use Illuminate\Support\ServiceProvider;

class BootstrapHelperServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/bootstrap-helper.php';

        $this->publishes([$configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/bootstrap-helper.php', 'bootstrap-helper');

        $this->app['bootstrap-helper.upgrade'] = $this->app->share(function () {
            return new Commands\BootstrapHelperUpgrade();
        });
        $this->commands(
            'bootstrap-helper.upgrade'
        );
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function getConfigPath()
    {
        return config_path('bootstrap-helper.php');
    }
}
