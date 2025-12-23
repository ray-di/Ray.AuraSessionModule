<?php

declare(strict_types=1);

namespace Ray\AuraSessionModule;

use PHPUnit\Framework\TestCase;

/** @var array<int, array{name: string, value: string, expires: int, path: string, domain: string}> */
$setCookieCalls = [];

/**
 * Override time function for testing
 */
function time(): int
{
    return 1000000;
}

/**
 * Override setcookie function for testing
 *
 * @return bool
 */
function setcookie(string $name, string $value = '', int $expires = 0, string $path = '', string $domain = '')
{
    global $setCookieCalls;

    $setCookieCalls[] = [
        'name' => $name,
        'value' => $value,
        'expires' => $expires,
        'path' => $path,
        'domain' => $domain,
    ];

    return true;
}

class DeleteCookieInvokerTest extends TestCase
{
    protected function setUp(): void
    {
        global $setCookieCalls;

        $setCookieCalls = [];
    }

    public function testInvoke(): void
    {
        global $setCookieCalls;

        $invoker = new DeleteCookieInvoker();
        $invoker('test_cookie', ['path' => '/app', 'domain' => 'example.com']);

        $this->assertCount(1, $setCookieCalls);
        $this->assertSame('test_cookie', $setCookieCalls[0]['name']);
        $this->assertSame('', $setCookieCalls[0]['value']);
        $this->assertSame(1000000 - 42000, $setCookieCalls[0]['expires']);
        $this->assertSame('/app', $setCookieCalls[0]['path']);
        $this->assertSame('example.com', $setCookieCalls[0]['domain']);
    }
}
