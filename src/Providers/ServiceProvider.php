<?php

namespace WuJunze\LaravelApollo\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use WuJunze\LaravelApollo\Console\UpdateCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->setConfig();

        $this->app->singleton(
            'command.apollo.update',
            function () {
                return new UpdateCommand();
            }
        );

        $this->commands('command.apollo.update');
    }

    protected function setConfig()
    {
        $source = realpath(__DIR__.'/../../config/apollo.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                $source => (function_exists('config_path') ?
                    config_path('apollo.php') :
                    base_path('config/apollo.php')),
            ]);
        }
        $this->mergeConfigFrom($source, 'apollo');
    }

}