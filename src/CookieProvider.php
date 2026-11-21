<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Override;
use Ray\Di\ProviderInterface;

/** @implements ProviderInterface<array<array-key, string>> */
class CookieProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @psalm-taint-source input
     */
    #[Override]
    public function get()
    {
        return $_COOKIE;
    }
}
