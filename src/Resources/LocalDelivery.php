<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class LocalDelivery extends AbstractResource
{
    protected string $segment = 'local-delivery';

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

        return $this->sendRequest($httpMethod, 'local-delivery/' . ltrim($path, '/'), $params);
    }

    public function businessStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'business-status', $pathParams, $params);
    }

    public function createDelivery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'create-delivery', $pathParams, $params);
    }

    public function createDeliveryV2CreateDelivery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/create-delivery', $pathParams, $params);
    }

    public function estimateDelivery(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'estimate-delivery', $pathParams, $params);
    }

    public function getAccountStatus(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/get-account-status', $pathParams, $params);
    }

    public function getDeliveryEstimate(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/get-delivery-estimate', $pathParams, $params);
    }

    public function listAccountIds(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'account-ids', $pathParams, $params);
    }

    public function listAccountIdsV2AccountIds(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/account-ids', $pathParams, $params);
    }

}