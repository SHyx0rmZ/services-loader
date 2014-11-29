<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class XmlServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 */
class XmlServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'xml';
    }
}
