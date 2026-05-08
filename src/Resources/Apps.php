<?php

namespace Chkltlabs\WixClient\Resources;

class Apps extends AbstractResource
{
    public function embedScript(array $params = []): object
    {
        return $this->sendRequest('post', 'apps/v1/scripts', $params);
    }

    public function getAppInstance(array $params = []): object
    {
        return $this->sendRequest('get', 'apps/v1/instance', $params);
    }

    public function getEmbeddedScript(array $params = []): object
    {
        return $this->sendRequest('get', 'apps/v1/scripts', $params);
    }

    public function getPurchaseHistory(array $params = []): object
    {
        return $this->sendRequest('get', 'apps/v1/checkout/history', $params);
    }

    public function getUrl(array $params = []): object
    {
        return $this->sendRequest('post', 'apps/v1/checkout', $params);
    }

    public function sendBIEvent(array $params = []): object
    {
        return $this->sendRequest('post', 'apps/v1/bi-event', $params);
    }

}