<?php
/**
 * This file is part of the Ray.AuraSessionModule package.
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\AuraSessionModule;

use Aura\Session\Session;
use Ray\Di\Injector;

class AuraSessionModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testAuraSessionModule()
    {
        $injector = new Injector(new AuraSessionModule);
        $session = $injector->getInstance(Session::class);
        $this->assertInstanceOf(Session::class, $session);
    }
}
