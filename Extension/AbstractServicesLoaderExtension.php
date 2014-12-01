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

        $file = $path . 'services.' . $this->getExtension();
        $dir  = $path . 'services.' . $this->getExtension() . '.d';

        $loader = new ServicesLoader($container);

        if (is_file($file)) {
            $loader->loadFromFile($file);
        }

        if (is_dir($dir)) {
            $loader->loadFromDirectory($dir);
        }
    }

    /**
     * @inheritdoc
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $this->loadServices($container);
    }
}
