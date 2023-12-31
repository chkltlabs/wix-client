<?php

namespace Chkltlabs\WixClient\Resources\Contacts;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Facets extends AbstractResource
{
    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/contacts/facets",
            $params
        );
    }

    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts/facets/query",
            $params
        );
    }
}