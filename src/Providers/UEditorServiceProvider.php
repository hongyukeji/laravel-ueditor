<?php

namespace Hongyukeji\LaravelUEditor\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Hongyukeji\LaravelUeditor\Services\StorageManagerService;

class UEditorServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'UEditor');

        $this->publishes([
            __DIR__ . '/../Config/ueditor.php' => config_path('ueditor.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../Resources/views' => base_path('Resources/views/vendor/ueditor'),
        ], 'view');

        $this->publishes([
            __DIR__ . '/../Resources/assets/ueditor' => public_path('vendor/ueditor'),
        ], 'assets');

        $this->registerRoute($router);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/ueditor.php', 'ueditor');
        $this->app->singleton('ueditor.storage', function ($app) {
            return new StorageManagerService(Storage::disk($app['config']->get('ueditor.disk', 'public')));
        });
    }

    protected function registerRoute($router)
    {
        if (!$this->app->routesAreCached()) {
            $router->group(array_merge(['namespace' => __NAMESPACE__ . '\Http\Controllers'], config('ueditor.route.options', [])), function ($router) {
                $router->any(config('ueditor.route.name', '/ueditor/server'), 'UEditorController@serve');
            });
        }
    }
}