<?php

declare(strict_types=1);

namespace Ray\AuraSessionModule;

use Aura\Session\Session;
use PHPUnit\Framework\TestCase;

class FakeSessionConsumer
{
    use AuraSessionInject;

    public function getSession(): Session
    {
        return $this->session;
    }
}

class AuraSessionInjectTest extends TestCase
{
    public function testSetSession(): void
    {
        $session = $this->createMock(Session::class);
        $consumer = new FakeSessionConsumer();
        $consumer->setSession($session);

        $this->assertSame($session, $consumer->getSession());
    }
}
