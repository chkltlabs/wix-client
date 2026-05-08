<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class SiteList extends AbstractResource
{
    protected string $segment = 'site-list';

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

        return $this->sendRequest($httpMethod, 'site-list/' . ltrim($path, '/'), $params);
    }

    public function countSites(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/sites/count', $pathParams, $params);
    }

    public function querySites(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/sites/query', $pathParams, $params);
    }

}