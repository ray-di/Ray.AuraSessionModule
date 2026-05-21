<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Aura\Session\SessionFactory;
use Ray\Di\ProviderInterface;

/** @deprecated */
class SessionProvider implements ProviderInterface
{
    /**
     * {@inheritDoc}
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     * @psalm-taint-source input
     */
    public function get()
    {
        return (new SessionFactory())->newInstance($_COOKIE);
    }
}
