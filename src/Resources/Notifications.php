<?php

namespace Chkltlabs\WixClient\Resources;

class Notifications extends AbstractResource
{
    public function notify(array $params = []): object
    {
        return $this->sendRequest('post', 'notifications/v3/notify', $params);
    }

}