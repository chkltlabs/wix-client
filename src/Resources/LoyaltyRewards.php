<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class LoyaltyRewards extends Domain
{
    protected string $segment = 'loyalty-rewards';

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

    public function createReward(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v1/rewards', $pathParams, $params);
    }

    public function deleteReward(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v1/rewards/{id}', $pathParams, $params);
    }

    public function getReward(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/rewards/{id}', $pathParams, $params);
    }

    public function listRewards(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v1/rewards', $pathParams, $params);
    }

    public function updateReward(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('put', 'v1/rewards/{reward.id}', $pathParams, $params);
    }

}