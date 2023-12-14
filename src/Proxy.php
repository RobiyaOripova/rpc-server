<?php

declare(strict_types=1);

namespace Robiya\Rpc;

use Robiya\Rpc\Http\Request;

interface Proxy
{
    /**
     * The method used by request handlers.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request): mixed;
}
