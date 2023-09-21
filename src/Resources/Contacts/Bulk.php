<?php

namespace Chkltlabs\WixClient\Resources\Contacts;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Bulk extends AbstractResource
{
    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/bulk/jobs",
            $params
        );
    }

    public function get(string $jobId, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/bulk/jobs/".$jobId,
            $params
        );
    }

    public function update(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/bulk/contacts/update",
            $params
        );
    }

    public function delete(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/bulk/contacts/delete",
            $params
        );
    }

    public function addRemoveLabels(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/bulk/contacts/add-remove-labels",
            $params
        );
    }
}