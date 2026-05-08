<?php

namespace Chkltlabs\WixClient\Resources;

use UnexpectedValueException;

class EventsPolicies extends AbstractResource
{
    protected string $segment = 'events-policies';

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

        return $this->sendRequest($httpMethod, 'events-policies/' . ltrim($path, '/'), $params);
    }

    public function createPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/policies', $pathParams, $params);
    }

    public function deletePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('delete', 'v2/policies/{policyId}', $pathParams, $params);
    }

    public function getPolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('get', 'v2/policies/{policyId}', $pathParams, $params);
    }

    public function queryPolicies(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/policies/query', $pathParams, $params);
    }

    public function reorderEventPolicies(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('post', 'v2/policies/reorder', $pathParams, $params);
    }

    public function updatePolicy(array $pathParams = [], array $params = []): object
    {
        return $this->executeOperation('patch', 'v2/policies/{policy.id}', $pathParams, $params);
    }

}