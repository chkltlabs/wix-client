<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class OauthApp extends Domain
{
    protected string $segment = 'oauth-app';

    private function executeOperation(string $httpMethod, string $path, array $pathParams = [], array $params = []): object
    {
        if (preg_match_all('/\{([^}]+)\}/', $path, $matches) > 0 && !empty($matches[1])) {
            foreach ($matches[1] as $placeholder) {
                $pathParamKey = explode('=', $placeholder)[0];
                if (!array_key_exists($pathParamKey, $pathParams)) {
                    throw new UnexpectedValueException('Missing required path param: ' . $pathParamKey);
                }
                $path = str_replace('{' . $placeholder . '}', rawurlencode((string) $pathParams[$pathParamKey]), $path);
            }
        }

        return $this->request($httpMethod, $path, $params);
    }

    public function createOAuthApp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/oauth-apps', $pathParams, $params);
    }

    public function deleteOAuthApp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/oauth-apps/{oAuthAppId}', $pathParams, $params);
    }

    public function generateOAuthAppSecret(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/oauth-apps/{oAuthAppId}/generate-secret', $pathParams, $params);
    }

    public function getOAuthApp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/oauth-apps/{oAuthAppId}', $pathParams, $params);
    }

    public function queryOAuthApps(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/oauth-apps/query', $pathParams, $params);
    }

    public function updateOAuthApp(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v1/oauth-apps/{oAuthApp.id}', $pathParams, $params);
    }

}