<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class PromoteSeoTxtFileServer extends AbstractResource
{
    protected string $segment = 'promote-seo-txt-file-server';

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

        return $this->sendRequest($httpMethod, 'promote-seo-txt-file-server/' . ltrim($path, '/'), $params);
    }

    public function appendAdsTxt(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/ads', $pathParams, $params);
    }

    public function getAdsTxt(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/ads', $pathParams, $params);
    }

    public function updateAdsTxt(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v2/ads', $pathParams, $params);
    }

}