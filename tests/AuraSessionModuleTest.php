<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

use Aura\Session\Session;
use PHPUnit\Framework\TestCase;
use Ray\Di\Injector;

use function serialize;
use function unserialize;

class AuraSessionModuleTest extends TestCase
{
    public function testAuraSessionModule(): void
    {
        $injector = new Injector(new AuraSessionModule());
        $session = $injector->getInstance(Session::class);
        $this->assertInstanceOf(Session::class, $session);
    }

    public function testSerialize(): void
    {
        $injector = new Injector(new AuraSessionModule());
        $session = $injector->getInstance(Session::class);
        $serialized = serialize($session);
        $this->assertIsString($serialized);
    }

    public function testDeserialize(): void
    {
        $injector = new Injector(new AuraSessionModule());
        $session = $injector->getInstance(Session::class);
        $serialized = serialize($session);
        $deserialized = unserialize($serialized);
        $this->assertInstanceOf(Session::class, $deserialized);
    }
}
