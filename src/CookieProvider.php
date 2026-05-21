<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Ray\Di\ProviderInterface;

class CookieProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @psalm-taint-source input
     */
    public function get()
    {
        return $_COOKIE;
    }
}
