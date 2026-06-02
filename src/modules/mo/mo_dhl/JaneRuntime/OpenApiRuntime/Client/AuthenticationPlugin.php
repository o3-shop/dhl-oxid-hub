<?php

/*
 * Vendored from  v7.5.5 (MIT). See JaneRuntime/README.md.
 */

declare(strict_types=1);

namespace Jane\Component\OpenApiRuntime\Client;

use Psr\Http\Message\RequestInterface;

interface AuthenticationPlugin
{
    public function authentication(RequestInterface $request): RequestInterface;

    public function getScope(): string;
}
