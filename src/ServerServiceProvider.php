<?php

declare(strict_types=1);

namespace Robiya\Rpc;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Robiya\Rpc\Commands\DocsCommand;
use Robiya\Rpc\Commands\ProcedureMakeCommand;

class ServerServiceProvider extends ServiceProvider
{
    /**
     * The available command shortname.
     *
     * @var string[]
     */
    protected array $commands = [
        ProcedureMakeCommand::class,
        DocsCommand::class,
    ];

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerViews();
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->commands($this->commands);
        $this->registerViews();

        Route::macro('rpc', fn (string $uri, array $procedures = [], string $delimiter = null) => Route::post($uri, [JsonRpcController::class, '__invoke'])
            ->setDefaults([
                'procedures' => $procedures,
                'delimiter'  => $delimiter,
            ]));

        $this->app->singleton(Binding::class, fn ($container) => new Binding($container));
    }

    /**
     * Register views & Publish views.
     *
     * @return $this
     */
    public function registerViews(): self
    {
        $path = __DIR__.'/../views';

        $this->loadViewsFrom($path, 'robiya');

        $this->publishes([
            $path => resource_path('views/vendor/robiya'),
        ], 'views');

        return $this;
    }
}
