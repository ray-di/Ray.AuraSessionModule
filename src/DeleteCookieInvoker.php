<?php

declare(strict_types=1);

/**
 * This file is part of the Ray.AuraSessionModule package.
 */

namespace Ray\AuraSessionModule;

final class DeleteCookieInvoker
{
    public const EXPIRE_OFFSET = 42000;

    /**
     * Delete a cookie by setting its expiration time to a past value
     *
     * @param array{path: string, domain: string} $params
     */
    public function __invoke(string $name, array $params): void
    {
        setcookie(
            $name,
            '',
            time() - self::EXPIRE_OFFSET,
            $params['path'],
            $params['domain'],
        );
    }
}
