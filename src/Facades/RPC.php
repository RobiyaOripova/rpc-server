<?php

declare(strict_types=1);

namespace Robiya\Rpc\Facades;

use Illuminate\Support\Facades\Facade;
use Robiya\Rpc\Binding;

/**
 * Class RPC
 *
 * @method static void bind(string $key, string|callable $binder)
 * @method static void model(string $key, string $class, \Closure|null $callback = null)
 *
 * @see \Robiya\Rpc\Binding
 */
class RPC extends Facade
{
    /**
     * Initiate a mock expectation on the facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Binding::class;
    }
}
