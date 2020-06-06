<?php


namespace SoluzioneSoftware\Iubenda;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->config();

        $this->views();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }

    private function config()
    {
        $this->publishes([
            __DIR__ . '/../config/iubenda.php' => App::configPath('iubenda.php'),
        ], ['config', 'iubenda', 'iubenda-config']);

        $this->mergeConfigFrom(__DIR__ . '/../config/iubenda.php', 'iubenda');
    }

    private function views()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => App::resourcePath('views/vendor/iubenda'),
        ], ['views', 'iubenda', 'iubenda-views']);

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'iubenda');
    }
}
