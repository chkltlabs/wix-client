<?php

namespace Chkltlabs\WixClient\Resources;

class Oauth extends AbstractResource
{
    public function accessTokenRequest(array $params = []): object
    {
        return $this->sendRequest('post', 'oauth/access', $params);
    }

}