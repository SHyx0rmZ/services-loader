<?php

namespace SHyx0rmZ\ServicesLoader;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\ClosureLoader;
use Symfony\Component\DependencyInjection\Loader\IniFileLoader;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class ServicesLoader
 * @package SHyx0rmZ\ServicesLoader
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
class ServicesLoader
{
    /** @var ContainerBuilder */
    private $container;

    public function __construct(ContainerBuilder $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $directory
     * @param bool $recursive
     */
    public function loadFromDirectory($directory, $recursive = true)
    {
        $finder = new Finder();
        $finder->files()->in($directory);

        if ($recursive === false) {
            $finder->depth('== 0');
        }

        /** @var SplFileInfo $file */
        foreach ($finder as $file) {
            $this->loadFromFile($file->getRealPath());
        }
    }

    /**
     * @param string $file
     */
    public function loadFromFile($file)
    {
        $locator = new FileLocator(dirname($file));
        $resolver = $this->getResolver($locator);

        $loader = $resolver->resolve($file);

        if ($loader !== false) {
            $loader->load(basename($file));
        }
    }

    /**
     * @param FileLocator $locator
     * @return LoaderResolver
     */
    private function getResolver(FileLocator $locator)
    {
        $loaders = array();

        $loaders[] = new YamlFileLoader($this->container, $locator);
        $loaders[] = new XmlFileLoader($this->container, $locator);
        $loaders[] = new PhpFileLoader($this->container, $locator);
        $loaders[] = new IniFileLoader($this->container, $locator);
        $loaders[] = new ClosureLoader($this->container);

        return new LoaderResolver($loaders);
    }
}
