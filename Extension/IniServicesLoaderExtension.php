<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class IniServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
class IniServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'ini';
    }
}
