# Ray.AuraSessionModule

[![Continuous Integration](https://github.com/ray-di/Ray.AuraSessionModule/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/ray-di/Ray.AuraSessionModule/actions/workflows/continuous-integration.yml)


An [Aura.Session](https://github.com/auraphp/Aura.Session) module for [Ray.Di](https://github.com/ray-di/Ray.Di).

## Installation

### Composer install

    $ composer require ray/aura-session-module

### Module install

```php
use Ray\Di\AbstractModule;
use Ray\AuraSessionModule\AuraSessionModule;

class AppModule extends AbstractModule
{
    protected function configure(): void
    {
        $this->install(new AuraSessionModule);
    }
}
```

## Usage

```php
use Aura\Session\Session;
use MyVendor\MyPackage\MyClass;

class Index extends ResourceObject
{
    public function __construct(
        private readonly Session $session
    ) {}
    
    public function onGet() : static
    {
        // get a _Segment_ object
        $segment = $this->session->getSegment(MyClass::class);
        
        // try to get a value from the segment;
        // if it does not exist, return an alternative value
        echo $segment->get('foo'); // null
        echo $segment->get('baz', 'not set'); // 'not set'
    }
}

```

