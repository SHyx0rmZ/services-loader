<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

use SHyx0rmZ\ServicesLoader\ServicesLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class ServicesLoaderExtension extends Extension
{
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

        $file = $path . 'services.';
        $dir  = $path . 'services.d';

        $extensions = array('ini', 'php', 'xml', 'yml');

        $loader = new ServicesLoader($container);

        foreach ($extensions as $extension) {
            if (is_file($file . $extension)) {
                $loader->loadFromFile($file . $extension);
            }
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
