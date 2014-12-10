<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class XmlServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 * @deprecated Deprecated since version 1.1.3, to be removed in 2.0. Use ServicesLoaderExtension instead.
 */
class XmlServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    public function __construct()
    {
        trigger_error('XmlServiceLoaderExtension is deprecated since version 1.1.3 and will be removed in 2.0. Use ServicesLoaderExtension instead.', E_USER_DEPRECATED);
    }

    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'xml';
    }
}
