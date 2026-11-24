# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).

## [Unreleased]

## [1.5.0] - 2026-11-24

### Added
- Psalm `@psalm-taint-source input` annotations on `CookieProvider` and `SessionProvider`, so Psalm taint analysis treats the injected cookie values as user input.

### Changed
- `CookieProvider` declares its provided type as `array<array-key, string|array<array-key, mixed>>`, allowing nested cookie values.
- `Cookie` and `DeleteCookie` declare `#[Attribute]` and `#[Qualifier]` as separate attributes.
- `AuraSessionInject::setSession()` declares a `void` return type. A subclass of a class using the trait that overrides `setSession()` must now declare `: void`.

### Removed
- The package no longer requires `ircmaxell/random-lib`, which it did not use. Users who rely on it must require it themselves.

## [1.4.0] - 2026-11-22

### Changed
- Allow `aura/session` ^6.0 and ^7.0 alongside ^4.0. `aura/session` 6.0 requires PHP 8.1 or later and 7.0 requires PHP 8.4 or later; Composer resolves the newest release the PHP version allows.

### Added
- PHP 8.5 and 8.6 in the CI matrix.

## [1.3.0] - 2025-11-11

### Changed
- Replace Doctrine annotations with native PHP 8 attributes.
- Require PHP 8.0 or later, `ray/di` ^2.14 and `aura/session` ^4.0.

## [1.2.2] - 2024-06-28

### Changed
- Update the license copyright year.

## [1.2.1] - 2024-06-28

### Added
- `DeleteCookieInvoker` for deleting the session cookie.

## [1.2.0] - 2022-09-28

### Changed
- Clean up, support PHP 8.2 and bind through the constructor.

## [1.1.0] - 2016-09-06

## [1.0.0] - 2015-09-06
- Initial release.

[Unreleased]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.5.0...HEAD
[1.5.0]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.4.0...1.5.0
[1.4.0]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.3.0...1.4.0
[1.3.0]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.2.2...1.3.0
[1.2.2]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.2.1...1.2.2
[1.2.1]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.2.0...1.2.1
[1.2.0]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.1.0...1.2.0
[1.1.0]: https://github.com/ray-di/Ray.AuraSessionModule/compare/1.0.0...1.1.0
[1.0.0]: https://github.com/ray-di/Ray.AuraSessionModule/releases/tag/1.0.0
