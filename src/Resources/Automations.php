<?php

namespace Chkltlabs\WixClient\Resources;

class Automations extends AbstractResource
{
    public function cancelEvent(array $params = []): object
    {
        return $this->sendRequest('post', 'automations/v1/events/cancel', $params);
    }

    public function reportEvent(array $params = []): object
    {
        return $this->sendRequest('post', 'automations/v1/events/report', $params);
    }

}