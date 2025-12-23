<?php

declare(strict_types=1);

namespace Ray\AuraSessionModule;

use Aura\Session\Session;
use PHPUnit\Framework\TestCase;

class SessionProviderTest extends TestCase
{
    public function testGet(): void
    {
        $provider = new SessionProvider();
        $session = $provider->get();
        $this->assertInstanceOf(Session::class, $session);
    }
}
