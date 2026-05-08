<?php

namespace Chkltlabs\WixClient\Resources;

class RedirectSession extends AbstractResource
{
    public function createRedirectSession(array $params = []): object
    {
        return $this->sendRequest('post', 'redirect-session/v1/redirect-session', $params);
    }

    public function createRedirectSessionV1Session(array $params = []): object
    {
        return $this->sendRequest('post', 'redirect-session/v1/session', $params);
    }

}