<?php

declare(strict_types=1);

namespace Robiya\Rpc\Exceptions;


class RuntimeRpcException extends RpcException
{
    /**
     * @return string
     */
    protected function getDefaultMessage(): string
    {
        return 'Unknown';
    }

    /**
     * @return int
     */
    protected function getDefaultCode(): int
    {
        return -1;
    }

    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report(): ?bool
    {
        return true;
    }
}
