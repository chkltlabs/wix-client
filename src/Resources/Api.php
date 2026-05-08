<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class Api extends AbstractResource
{
    protected string $segment = 'api';

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

        return $this->sendRequest($httpMethod, 'api/' . ltrim($path, '/'), $params);
    }

    public function update(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'plugin/v1/transactions/{transactionId}', $pathParams, $params);
    }

}