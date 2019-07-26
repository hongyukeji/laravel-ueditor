<?php

namespace Hongyukeji\LaravelUEditor\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class UEditorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'UEditor');

        $this->publishes([
            __DIR__ . '/../Config/ueditor.php' => config_path('ueditor.php'),
        ], 'config');

        $this->publishes([
            realpath(__DIR__ . '/../Resources/views') => base_path('Resources/views/vendor/ueditor'),
        ], 'view');

        $this->publishes([
            realpath(__DIR__ . '/../Resources/assets/ueditor') => public_path('vendor/ueditor'),
        ], 'assets');

        $this->registerRoute();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/ueditor.php', 'ueditor');
        $this->app->singleton('ueditor.storage', function ($app) {
            return new StorageManager(Storage::disk($app['config']->get('ueditor.disk', 'public')));
        });
    }

    protected function registerRoute()
    {
        $router = new Router();
        if (!$this->app->routesAreCached()) {
            $router->group(array_merge(['namespace' => __NAMESPACE__ . '\Http\Controllers'], config('ueditor.route.options', [])), function ($router) {
                $router->any(config('ueditor.route.name', '/ueditor/server'), 'UEditorController@serve');
            });
        }
    }
}