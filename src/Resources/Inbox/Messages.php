<?php

namespace Chkltlabs\WixClient\Resources\Inbox;

use Chkltlabs\WixClient\Resources\AbstractResource;

class Messages extends AbstractResource
{

    public function list(array $params = []): object
    {
        return $this->sendRequest(
            'get',
            "inbox/v2/messages",
            $params
        );
    }
    public function send(array $params = []): object
    {
        return $this->sendRequest(
            'post',
            "inbox/v2/messages",
            $params
        );
    }
}