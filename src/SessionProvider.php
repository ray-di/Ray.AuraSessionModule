<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Aura\Session\Session;
use Aura\Session\SessionFactory;
use Override;
use Ray\Di\ProviderInterface;

/**
 * @deprecated
 * @implements ProviderInterface<Session>
 */
class SessionProvider implements ProviderInterface
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
        return (new SessionFactory())->newInstance($_COOKIE);
    }
}
