<?php

namespace Chkltlabs\WixClient\Resources;

class DomainSearch extends AbstractResource
{
    public function checkDomainAvailability(array $params = []): object
    {
        return $this->sendRequest('get', 'domain-search/v2/check-domain-availability', $params);
    }

    public function suggestDomains(array $params = []): object
    {
        return $this->sendRequest('get', 'domain-search/v2/suggest-domains', $params);
    }

}