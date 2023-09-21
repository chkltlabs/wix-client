<?php

namespace Chkltlabs\WixClient\Resources\Inbox;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Conversations extends AbstractResource
{
    public function findOrCreate(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "inbox/v2/conversations",
            $params
        );
    }

    public function get(string $conversationId, array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "inbox/v2/conversations/" . $conversationId,
            $params
        );
    }
}