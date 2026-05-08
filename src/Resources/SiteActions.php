<?php

namespace Chkltlabs\WixClient\Resources;

class SiteActions extends AbstractResource
{
    public function bulkDeleteSite(array $params = []): object
    {
        return $this->sendRequest('post', 'site-actions/v1/bulk/sites/delete', $params);
    }

}