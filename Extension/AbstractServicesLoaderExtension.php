<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

use SHyx0rmZ\ServicesLoader\ServicesLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * Class AbstractServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
abstract class AbstractServicesLoaderExtension extends Extension
{
    /**
     * @return string
     */
    abstract protected function getExtension();

    /**
     * @param ContainerBuilder $container
     */
    private function loadServices(ContainerBuilder $container)
    {
        $class = new \ReflectionClass(get_class($this));
        $path = dirname($class->getFileName());
        $path .= DIRECTORY_SEPARATOR . '..';
        $path .= DIRECTORY_SEPARATOR . 'Resources';
        $path .= DIRECTORY_SEPARATOR . 'config';
        $path .= DIRECTORY_SEPARATOR;

        $loader = new ServicesLoader($container);
        $loader->loadFromFile(
            $path . 'services.' . $this->getExtension()
        );
        $loader->loadFromDirectory(
            $path . 'services.' . $this->getExtension() . '.d'
        );
    }

    /**
     * @inheritdoc
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $this->loadServices($container);
    }
}
