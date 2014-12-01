services-loader
===============
[![Latest Stable Version](https://poser.pugx.org/ppokatilo/services-loader/v/stable.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![Total Downloads](https://poser.pugx.org/ppokatilo/services-loader/downloads.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![Latest Unstable Version](https://poser.pugx.org/ppokatilo/services-loader/v/unstable.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![License](https://poser.pugx.org/ppokatilo/services-loader/license.svg)](https://packagist.org/packages/ppokatilo/services-loader)

Easier loading of services in your Symfony2 bundle's extension.

## How to use

Use ServiceLoader to load service definitions from files in directories (recursively, if you wish). Use any of the Extensions to make loading even easier.

```php
<?php

namespace You\YourBundle\DependencyInjection;

use SHyx0rmZ\ServicesLoader\Extension\YamlServicesLoaderExtension;

class YourExtension extends YamlServicesLoaderExtension
{
}
```

This effectively is the same as if you had written:

```php
<?php

namespace You\YourBundle\DependencyInjection;

use SHyx0rmZ\ServicesLoader\ServicesLoader;

class YourExtension extends Extension
{
  public function load(array $config, ContainerBuilder $container)
  {
    $loader = new ServiceLoader($container);
    $loader->loadFromFile(__DIR__ . '/../Resources/config/services.yml');
    $loader->loadFromDirectory(__DIR__ . '/../Resources/config/services.yml.d');
  }
}
```

Which will for example load service definitions from:

* YourBundle/Resources/config/services.yml
* YourBundle/Resources/config/services.yml.d/commands.yml
* YourBundle/Resources/config/services.yml.d/database/clients.yml
