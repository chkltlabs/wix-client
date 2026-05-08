<?php

namespace Chkltlabs\WixClient\Resources;

class OauthApp extends AbstractResource
{
    public function createOAuthApp(array $params = []): object
    {
        return $this->sendRequest('post', 'oauth-app/v1/oauth-apps', $params);
    }

    public function deleteOAuthApp(string $oAuthAppId, array $params = []): object
    {
        return $this->sendRequest('delete', "oauth-app/v1/oauth-apps/{$oAuthAppId}", $params);
    }

    public function generateOAuthAppSecret(string $oAuthAppId, array $params = []): object
    {
        return $this->sendRequest('post', "oauth-app/v1/oauth-apps/{$oAuthAppId}/generate-secret", $params);
    }

    public function getOAuthApp(string $oAuthAppId, array $params = []): object
    {
        return $this->sendRequest('get', "oauth-app/v1/oauth-apps/{$oAuthAppId}", $params);
    }

    public function queryOAuthApps(array $params = []): object
    {
        return $this->sendRequest('post', 'oauth-app/v1/oauth-apps/query', $params);
    }

    public function updateOAuthApp(string $oAuthAppId, array $params = []): object
    {
        return $this->sendRequest('patch', "oauth-app/v1/oauth-apps/{$oAuthAppId}", $params);
    }

}