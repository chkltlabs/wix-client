<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Apps extends Domain
{
    protected string $segment = 'apps';

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

    public function embedScript(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/scripts', $pathParams, $params);
    }

    public function getAppInstance(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/instance', $pathParams, $params);
    }

    public function getEmbeddedScript(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/scripts', $pathParams, $params);
    }

    public function getPurchaseHistory(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/checkout/history', $pathParams, $params);
    }

    public function getUrl(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/checkout', $pathParams, $params);
    }

    public function sendBIEvent(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/bi-event', $pathParams, $params);
    }

}