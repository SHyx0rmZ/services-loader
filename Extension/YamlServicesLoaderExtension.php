<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class YamlServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
class YamlServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'yml';
    }
}
