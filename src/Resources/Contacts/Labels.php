<?php

namespace Chkltlabs\WixClient\Resources\Contacts;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Labels extends AbstractResource
{
    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/labels",
            $params
        );
    }

    public function get(string $key, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/labels/".$key,
            $params
        );
    }

    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/labels",
            $params
        );
    }

    public function update(string $key, array $params = []): object
    {
        return $this->sendRequest(
            'patch',
            "contacts/v4/labels/".$key,
            $params
        );
    }

    public function delete(string $key, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "contacts/v4/labels/".$key,
            $params
        );
    }

    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/labels/query",
            $params
        );
    }
}