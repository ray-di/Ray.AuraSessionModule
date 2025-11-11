<?php

declare(strict_types=1);

namespace Ray\AuraSessionModule;

use Aura\Session\Session;

/**
 * @deprecated Use PHP 8.0: Class constructor property promotion instead
 */
trait AuraSessionInject
{
    /** @var Session */
    protected $session;

    public function setSession(Session $session)
    {
        $this->session = $session;
    }
}
