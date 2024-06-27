<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Aura\Session\CsrfTokenFactory;
use Aura\Session\Phpfunc;
use Aura\Session\Randval;
use Aura\Session\RandvalInterface;
use Aura\Session\SegmentFactory;
use Aura\Session\Session;
use Ray\AuraSessionModule\Annotation\Cookie;
use Ray\AuraSessionModule\Annotation\DeleteCookie;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class AuraSessionModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(Session::class)->toConstructor(Session::class, [
            'cookies' => Cookie::class,
            'delete_cookie' => DeleteCookie::class,
        ]);
        $this->bind()->annotatedWith(Cookie::class)->toProvider(CookieProvider::class);
        $this->bind()->annotatedWith(DeleteCookie::class)->toInstance([new DeleteCookieInvoker(), '__invoke']);
        $this->bind(SegmentFactory::class);
        $this->bind(CsrfTokenFactory::class);
        $this->bind(RandvalInterface::class)->to(Randval::class);
        $this->bind(Phpfunc::class)->in(Scope::SINGLETON);
    }
}
