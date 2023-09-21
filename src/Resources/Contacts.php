<?php

namespace Chkltlabs\WixClient\Resources;

use Chkltlabs\WixClient\Traits\HasCachedResources;

/**
 * @property Chkltlabs\WixClient\Resources\Contact\Placeholder $spoot
 * 
 */
class Contacts extends AbstractResource 
{
    use HasCachedResources;

    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/contacts",
            $params
        );
    }

    public function get(string $contactId, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "contacts/v4/contacts/".$contactId,
            $params
        );
    }

    public function create(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts",
            $params
        );
    }

    public function update(string $contactId, array $params = []): object
    {
        return $this->sendRequest(
            'patch',
            "contacts/v4/contacts/" . $contactId,
            $params
        );
    }

    public function delete(string $contactId, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "contacts/v4/contacts/" . $contactId,
            $params
        );
    }
    
    public function merge(string $targetContactId, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts/" . $targetContactId . "/merge",
            $params
        );
    }
    
    public function previewMerge(string $targetContactId, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts/" . $targetContactId . "/preview-merge",
            $params
        );
    }
    
    public function label(string $contactId, array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts/" . $contactId . "/labels",
            $params
        );
    }
    
    public function unlabel(string $contactId, array $params = []): object
    {
        return $this->sendRequest(
            'delete',
            "contacts/v4/contacts/" . $contactId . "/labels",
            $params
        );
    }

    public function query(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "contacts/v4/contacts/query",
            $params
        );
    }
}