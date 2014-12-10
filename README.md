services-loader
===============
[![Latest Stable Version](http://poser.services.witches.io/ppokatilo/services-loader/v/stable.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![Total Downloads](http://poser.services.witches.io/ppokatilo/services-loader/downloads.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![Latest Unstable Version](http://poser.services.witches.io/ppokatilo/services-loader/v/unstable.svg)](https://packagist.org/packages/ppokatilo/services-loader)
[![License](http://poser.services.witches.io/ppokatilo/services-loader/license.svg)](https://packagist.org/packages/ppokatilo/services-loader)

Easier loading of services in your Symfony2 bundle's extension.

## How to use

Use ServiceLoader to load service definitions from files in directories (recursively, if you wish).

```php
<?php

namespace You\YourBundle\DependencyInjection;

use SHyx0rmZ\ServicesLoader\ServicesLoader;

class YourExtension extends Extension
{
  public function load(array $config, ContainerBuilder $container)
  {
    $loader = new ServiceLoader($container);
    $loader->loadFromFile(__DIR__ . '/../Resources/config/services.ini');
    $loader->loadFromDirectory(__DIR__ . '/../Resources/config/services.d');
  }
}
```

Use the Extension to make loading even easier.

```php
<?php

namespace You\YourBundle\DependencyInjection;

use SHyx0rmZ\ServicesLoader\Extension\ServicesLoaderExtension;

class YourExtension extends ServicesLoaderExtension
{
}
```

Which will  load service definitions from:

* YourBundle/Resources/config/services.ini
* YourBundle/Resources/config/services.php
* YourBundle/Resources/config/services.xml
* YourBundle/Resources/config/services.yml
* and everything in services.d
  * YourBundle/Resources/config/services.d/commands.yml
  * YourBundle/Resources/config/services.d/database/clients.yml
