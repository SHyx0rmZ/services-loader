<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class PhpServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
class PhpServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'php';
    }
}
