<?php

namespace SHyx0rmZ\ServicesLoader\Extension;

/**
 * Class YamlServicesLoaderExtension
 * @package SHyx0rmZ\ServicesLoader\Extension
 * @author Patrick Pokatilo <mail@shyxormz.net>
 * @deprecated Deprecated since version 1.1.3, to be removed in 2.0. Use ServicesLoaderExtension instead.
 */
class YamlServicesLoaderExtension extends AbstractServicesLoaderExtension
{
    public function __construct()
    {
        trigger_error('YamlServiceLoaderExtension is deprecated since version 1.1.3 and will be removed in 2.0. Use ServicesLoaderExtension instead.', E_USER_DEPRECATED);
    }

    /**
     * @inheritdoc
     */
    protected function getExtension()
    {
        return 'yml';
    }
}
